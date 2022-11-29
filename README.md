
# Test Backend - Sharing Vision 2021



Step by step:

```bash
  git clone git@github.com:hafizhpratama-icube/test-backend-sharing-vision.git
```
```bash
  composer install
```
```bash
  copy .env.example
  paste dan rename menjadi copy .env

  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=article
  DB_USERNAME=root
  DB_PASSWORD=28april1999
```

```bash
  run php artisan key:generate
```
```bash
  php artisan migrate
```
```bash
  php artisan db:seed
```
```bash
  php artisan serve --port=8088 (run menggunakan port 8088 karena diset static)
```



## Collection Postman

[Collection Postman](https://api.postman.com/collections/14076346-f2d06fcc-ea8e-47b8-800e-faac2aa31eb2?access_key=PMAT-01GK0ZS82JPNJ5AV2QE48YR1J3)


## Screenshoot

Login. Lalu copy token dan masukkan ke Authorization dengan tipe Bearer Token.

<img width="1440" alt="Screen Shot 2022-11-29 at 14 59 51" src="https://user-images.githubusercontent.com/79433320/204480841-283fa533-9489-41dd-961c-45530743d150.png">

Create Article. Jangan lupa masukkan token ke Authorization dengan tipe Bearer Token.

<img width="1440" alt="Screen Shot 2022-11-29 at 14 59 59" src="https://user-images.githubusercontent.com/79433320/204481337-d688823e-ef26-4169-ab1d-f6a86e122040.png">

<img width="1440" alt="Screen Shot 2022-11-29 at 15 00 13" src="https://user-images.githubusercontent.com/79433320/204481621-243e692b-dd88-4910-8ef9-f069d08e01f7.png">

Get All Article. Jangan lupa masukkan token ke Authorization dengan tipe Bearer Token.
<img width="1440" alt="Screen Shot 2022-11-29 at 15 00 29" src="https://user-images.githubusercontent.com/79433320/204481867-328bddb8-8241-4b9b-a676-122f770ba51c.png">

Get Spesific Article. Jangan lupa masukkan token ke Authorization dengan tipe Bearer Token.
<img width="1440" alt="Screen Shot 2022-11-29 at 15 00 41" src="https://user-images.githubusercontent.com/79433320/204481995-346d2a69-29cb-4ade-ba46-7904eb9e403a.png">

Edit Spesific Article. Jangan lupa masukkan token ke Authorization dengan tipe Bearer Token.
<img width="1440" alt="Screen Shot 2022-11-29 at 15 01 04" src="https://user-images.githubusercontent.com/79433320/204482109-13488217-84e0-4b82-915c-6a689e7cad92.png">

Delete Spesific Article. Jangan lupa masukkan token ke Authorization dengan tipe Bearer Token.
<img width="1440" alt="Screen Shot 2022-11-29 at 15 01 15" src="https://user-images.githubusercontent.com/79433320/204482756-454beec0-97e2-46e3-bca8-4124982895c3.png">
