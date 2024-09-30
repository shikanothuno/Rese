# プリケーション名：Rese  
勤怠管理アプリ  
* 飲食店の詳細が確認できる。
* 飲食店の予約と予約変更ができる。
* 会員登録とログイン、ログアウトができる。
* ユーザーがお気に入りの店舗を登録できる。
* エリア、ジャンル、店名で検索できる。
* 管理者で店舗代表者を作成できる。
* 店舗代表者で店舗情報を更新し、画像を保存できる。
* QRコードを作成できる。
* 決済ができる。
* 飲食店予約情報がリマインドさせる。

トップ画面の画像
![[トップ画面]top-view.png](/images/top-view.png)

## 作成した目的  
ある企業が人事評価向上のために勤怠管理システムの導入を希望したため。  

## アプリケーションURL  
http://localhost/  

## 機能一覧  
* ログイン機能  
* 新規登録機能  
* ログアウト機能  
* ユーザー情報取得機能
* ユーザー飲食店お気に入り一覧取得
* ユーザー飲食店予約情報取得
* 飲食店一覧取得
* 飲食店詳細取得
* 飲食店お気に入り追加、削除
* 飲食店予約情報追加、削除
* エリア、ジャンル、店名で検索する
* 飲食店予約情報変更
* 店舗代表者登録
* お知らせメール送信
* 飲食店予約情報リマインド
* QRコード作成
* 決済

## 使用技術  
|アプリケーション名|バージョン|
|:---------------|:--------|
|PHP|8.2.12|
|Mysql|8.0.26|
|nginx|1.21.1|
|laravel|11.70|

## 設計したテーブル  

### shopsテーブル
| カラム名      | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|---------------|-----------|-------------|------------|----------|-------------|
| id            | integer   | O           | O          | O        |             |
| name          | varchar   |             |            | O        |             |
| region_id     | integer   |             |            | O        | O           |
| genre_id      | integer   |             |            | O        | O           |
| description   | text      |             |            |          |             |
| image_url     | varchar   |             |            |          |             |
| create_at     | timestamp |             |            |          |             |
| update_at     | timestamp |             |            |          |             |


### reservationsテーブル
| カラム名                  | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|---------------------------|-----------|-------------|------------|----------|-------------|
| id                        | integer   | O           | O          | O        |             |
| user_id                   | integer   |             |            | O        | O           |
| shop_id                   | integer   |             |            | O        | O           |
| number_of_people_booked    | integer   |             |            |          |             |
| reservation_date_and_time | dateTime  |             |            | O        |             |
| create_at                 | timestamp |             |            |          |             |
| update_at                 | timestamp |             |            |          |             |

### favoritesテーブル
| カラム名  | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|-----------|-----------|-------------|------------|----------|-------------|
| id        | integer   | O           | O          | O        |             |
| user_id   | integer   |             |            | O        | O           |
| shop_id   | integer   |             |            | O        | O           |
| create_at | timestamp |             |            |          |             |
| update_at | timestamp |             |            |          |             |

### usersテーブル
| カラム名                 | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|--------------------------|-----------|-------------|------------|----------|-------------|
| id                       | integer   | O           | O          | O        |             |
| name                     | varchar   |             |            | O        |             |
| email                    | varchar   |             |            | O        |             |
| email_verified_at        | timestamp |             |            |          |             |
| password                 | varchar   |             |            | O        |             |
| is_general_user          | boolean   |             |            | O        |             |
| is_store_representative  | boolean   |             |            | O        |             |
| is_admin                 | boolean   |             |            | O        |             |
| create_at                | timestamp |             |            |          |             |
| update_at                | timestamp |             |            |          |             |

### regionsテーブル
| カラム名   | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|------------|-----------|-------------|------------|----------|-------------|
| id         | integer   | O           | O          | O        |             |
| name       | varchar   |             |            | O        |             |
| create_at  | timestamp |             |            |          |             |
| update_at  | timestamp |             |            |          |             |

### genresテーブル
| カラム名   | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|------------|-----------|-------------|------------|----------|-------------|
| id         | integer   | O           | O          | O        |             |
| name       | varchar   |             |            | O        |             |
| create_at  | timestamp |             |            |          |             |
| update_at  | timestamp |             |            |          |             |

### reviewsテーブル
| カラム名  | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|-----------|-----------|-------------|------------|----------|-------------|
| id        | integer   | O           | O          | O        |             |
| user_id   | integer   |             |            | O        | O           |
| shop_id   | integer   |             |            | O        | O           |
| comment   | text      |             |            | O        |             |
| rating    | integer   |             |            | O        |             |
| create_at | timestamp |             |            |          |             |
| update_at | timestamp |             |            |          |             |

### imagesテーブル
| カラム名   | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|------------|-----------|-------------|------------|----------|-------------|
| id         | integer   | O           | O          | O        |             |
| shop_id    | integer   |             |            | O        | O           |
| image_name | varchar   |             | O          | O        |             |
| url        | varchar   |             |            | O        |             |
| is_s3      | boolean   |             |            | O        |             |
| create_at  | timestamp |             |            |          |             |
| update_at  | timestamp |             |            |          |             |

## 作成したER図  

![[作成したER図]er.png](/images/er2.png)  
 
# 環境構築  
Dockerで環境構築を行っている  

## 環境構築手順  
1. 環境構築用のディレクトリを用意する  
2. Gitをダウンロードする  
3. 以下のコマンドをコマンドプロンプトに入力する  
```
git clone https://github.com/shikanothuno/Rese.git
```
4. Dockerをインストールし、起動する  
5. Reseフォルダの中でコマンドプロンプトを開いて以下のコマンドを入力する  
```
docker compose build
```
6. srcファイルの中の.env.exampleを.envファイルとしてコピーする  
コピーには以下のコマンドを使用する  
```
cd ./src
cp .env.example .env
```
7. コピーした.envファイルの内容を以下のように書き換える  

before　　
```before
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

```

after　　

```after
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

MAIL_MAILER=smtp
MAIL_HOST=mail
MAIL_PORT=1025

```

8. 以下のコマンドでPHPサーバーに入る  
```
cd ../
docker compose up -d
docker compose exec php bash
```

9. 以下のコマンドで必要なファイルをインストールする  
```
composer install
```

10. 以下のコマンドでAPI Keyを生成する
```
php artisan key:generate
```
11. 以下のコマンドでシンボリックリンクを作成する
```
php artisan storage:link
```
12. 以下のコマンドでマイグレーションファイルを再生成し、ダミーデータを作成する
```
php artinsa migrate:fresh --seed
```

13. 以下のユーザメールとパスワードを使ってログインする  
管理者
```
email:admin@example.com
password:password
```
店舗代表者
```
email:store@example.com
password:password
```
一般利用者
```
email:test0example.com
password:password
```

14. アプリの機能を確認する  

## ユーザー登録手順
1.新規登録画面からユーザー名、メールアドレス、パスワードを登録する  
2.確認メールの送信確認画面に遷移するので、loalhost:8025のMailHogの画面で、  
メールが届いているのを確認する  
3.メールのリンクをクリックし、メール認証を完了する  

## 開発環境と本番環境の切り分け  
### 開発環境の場合  
以下のコマンドで起動する  
```
docker compose --env-file .env.testing up -d --build
```  
また、以下のファイルに開発環境の環境設定を記述する
```
.env.testing
```
### 本番環境の場合
以下のコマンドで実行する  
```
docker compose --env-file .env.production up -d --build
```
また、以下のファイルに本番環境の環境設定を記述する  
```
.env.production
```  
