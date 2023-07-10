# Cách Cài Đặt

### Clone dự án về

Copy file tạo file .env > copy nội dung file .evn.example qua

### Chạy các lệnh sau theo thứ tự:

```
composer install
npm install
php artisan key:generate
```

### Tạo database tên ```antique_auction_2``` và chạy lệnh sau:

```
php artisan migrate
```

### Mở 2 cửa số console mới (Ctrl + j ) và chạy tiếp 2 lệnh sau: 

```
npm run dev
php artisan serve
```
