<?php

use App\Enums\StatusType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->comment('メールアドレス');
            $table->string('actKey')->nullable()->comment('アクティベーションキー');
            $table->string('expiry')->nullable()->comment('アクティベーションキーの有効期限');
            $table->enum('status', ['waiting', 'complete'])->default('waiting')->nullable(false)->comment('登録状態');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_users');
    }
}
