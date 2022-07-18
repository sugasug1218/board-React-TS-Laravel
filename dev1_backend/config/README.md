## 環境構築
以下のフォルダ構成にする
```
  <project-name>
  ├── config // このレポジトリ
  ├── api // Laravelプロジェクト（構築手順で作成する）
```

## コンテナ作成 
```
docker-compose build
docker-compose up -d
```
## DB確認
http://localhost:18080　にアクセスする
```
サーバ:mysql
ユーザ名: docker-composeに記載
パスワード: docker-composeに記載
データベース: docker-composeに記載
```
## Laravelインストール
```
### PHPのコンテナの中に入る
docker-compose exec php bash

Laravelインストール(https://readouble.com/laravel/8.x/ja/installation.html)
composer create-project laravel/laravel:^X.X .
```
## サーバー起動
```
nginx起動
docker-compose exec server bash -c "systemctl start nginx && systemctl enable nginx"
```
## env書き換
```
vim .env
 DB_CONNECTION=mysql
 DB_HOST=mysql
 DB_PORT=3306
 DB_DATABASE=api_db
 DB_USERNAME=api_user
 DB_PASSWORD=p@ssw0rd
```
### マイグレ
```
## PHPのコンテナの中で
php artisan migrate
```



- http://localhost:8080 を確認
  - Laravelの初期画面が表示されればOK

- Dockerの起動(start)
```
docker-compose start
docker-compose exec server bash -c "systemctl start nginx && systemctl enable nginx"
```

- Dockerの起動(up)
```
docker-compose up -d
docker-compose exec server bash -c "systemctl start nginx && systemctl enable nginx"
```



 - tasks
・composerのバージョン確認をやめる
・laravelをインストールする手順を入れる

#### tips
以下で、「Permission Denied」
https://qiita.com/ryotaro0999/items/3b47ee0ceb310278ac3a

Docker for mac (ver 4.3以降) で「Failed to get D-Bus connection」エラーが出たときの対処法
https://qiita.com/NaoyaMiyagawa/items/22a870112377a91e1c99


