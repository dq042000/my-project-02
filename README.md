# 安裝方式

## 設定 hosts

  - 打開 Terminal
```
  sudo vi /etc/hosts
```

  - 增加

```
  127.0.0.1		mybook.tw
```

  - 按下 `Esc` 鍵後，儲存後離開
```
  按下 鍵盤 `Esc` 鍵
  :wq
```

## docker 設定檔

```
cp docker-compose-sample.yml docker-compose.yml
cp env-sample .env
cp ./web/.env.example ./web/.env
```

## 啟動 docker

```
docker-compose up -d --build
```

## 安裝 php library

```
docker exec -ti my-project-02_php-fpm_1 composer install
```

## 設定 Laravel
1. 權限
```
sudo chmod -R 777 ./web/bootstrap/cache/ ./web/storage/
```

2. 設定 config
```
vi ./web/config/app.php
vi ./web/config/database.php
```

## 安裝資料庫
1. 建立 `mybook` 資料庫

2. 執行 Migrate
```
php ./web/artisan migrate:fresh
```

3. 打開 `phpMyAdmin` 匯入 `./web/db/mybook.sql`

## 開啟瀏覽器

    網站
    http://localhost:9810

    phpMyAdmin
    http://localhost:9811

