# 掲示板アプリ
コメントができる、スレッド式の掲示板を作成します。
docker+Laravelの環境で作成。

## 機能
- 認証機能
    - ログイン
    - ユーザー登録
- 新規投稿
- レスポンス機能
- 編集機能
- 削除機能
- 管理者権限

## 注意
管理者権限を与えるにはデータベースを直接書かないといけない（もしくはmyadminで変更する）



## 環境

| Type     | version |
| :------- | :------ |
| php | 7.2|
| mysql | 8.0|
| laravel | 7.30.6|

| コンテナ | image |port |
| :------- | :------ |:------ |
|DB(MySQL)|mysql:8.0 |0.0.0.0:3306->3306/tcp|
|NW(nginx)|nginx |0.0.0.0:8080->80/tcp|
|AP(php)|board_web |9000/tcp|
|WB(phpmyadmin)|phpmyadmin/phpmyadmin |0.0.0.0:8080->80/tcp|


## 使い方

```bash
cd keijiban
cd board
docker-compose up -d --build

//SQLの設定
docker exec -it app_db mysql -u root -p
password>root
use development;
ALTER user 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'root';

//migrate処理
docker exec -it app_php bash
php artisan migrate
```

## 
## 参考
https://yama-itech.net/laravel-auth-function
https://readouble.com/laravel/7.x/ja/authentication.html
https://qiita.com/Mi_tsu_ya/items/2d850c981d5fc60856f5
https://qiita.com/You_name_is_YU/items/71f3ec51a19a2361519b
https://takaolab.com/sqlstate-hy000-2054/
