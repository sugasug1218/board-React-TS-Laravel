<?php

namespace App\Models;

use App\Enums\StatusType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'actKey',
        'status'
    ];

    protected $hidden = [
        'actKey',
        'expiry'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'status' => StatusType::class
    ];

    /**
     * idのスコープ
     *
     * @param integer $id
     * @return App\Model\PreUser
     */
    public function scopeFindPreUserId($query, int $id)
    {
        return $query->find($id);
    }

    /**
     * 仮ユーザーの登録をします
     *
     * @param array $option
     * @return App\Model\PreUser
     */
    public function createPreUserByRequest(array $option): PreUser
    {
        return $this->updateOrCreate([
            'email' => $option['email']
        ], [
            'actKey' => $option['actKey'],
            'expiry' => $option['expiry'],
            'status' => StatusType::WAITING
        ]);
    }

    /**
     * アクティベーションキーの有効期限をチェックします
     *
     * @param int $id
     * @param string $actKey
     * @param string $accessDateTime
     * @return bool
     */
    public function validActKey(int $id, string $actKey, string $accessDateTime): bool
    {
        return $this->findPreUserId($id)
            ->where('actKey', $actKey)
            ->where('expiry', '>=', $accessDateTime)
            ->exists();
    }

    /**
     * 既に本登録済みのユーザーがいないかチェックします
     *  - 二重登録防止
     *
     * @param string $email
     * @return bool
     */
    public function validAlreadyRegistered(string $email): bool
    {
        return $this->where('email', $email)->exists();
    }
}
