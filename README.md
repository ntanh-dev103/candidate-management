# Candidate Management

Ứng dụng quản lý ứng viên xây dựng bằng Laravel 12, dùng Eloquent ORM, Resource Controller, Blade, Form Request Validation, Migration, Seeder và Pagination.

## Tính năng

- Laravel 12
- Git workflow theo từng chức năng
- Migration tạo bảng `candidates`
- Seeder 20 bản ghi mẫu
- Model `Candidate` và Eloquent ORM
- Resource Controller cho CRUD đầy đủ
- Blade cho giao diện danh sách, tạo mới, xem chi tiết, chỉnh sửa
- Route Resource
- Form Request Validation cho tạo mới và cập nhật
- CRUD ứng viên
- Pagination 10 bản ghi mỗi trang
- Search theo tên
- Filter theo trạng thái

## Cấu trúc chính

- `app/Http/Controllers/CandidateController.php`
- `app/Http/Requests/StoreCandidateRequest.php`
- `app/Http/Requests/UpdateCandidateRequest.php`
- `app/Models/Candidate.php`
- `database/migrations/2026_07_02_073836_create_candidates_table.php`
- `database/seeders/CandidateSeeder.php`
- `database/factories/CandidateFactory.php`
- `resources/views/candidates/`
- `routes/web.php`

## Trường dữ liệu

- `full_name`
- `email`
- `phone`
- `status`

Trạng thái hỗ trợ:

- `Applied`
- `Interview`
- `Hired`
- `Rejected`

## Cài đặt

1. Cài dependencies PHP và frontend nếu cần.
2. Tạo file môi trường từ `.env.example`.
3. Cấu hình database trong `.env`.
4. Chạy migrate và seed dữ liệu.

```bash
php artisan migrate --seed
```

Nếu muốn reset toàn bộ dữ liệu và tạo lại từ đầu:

```bash
php artisan migrate:fresh --seed
```

## Chạy ứng dụng

```bash
php artisan serve
```

Sau đó mở:

```bash
http://127.0.0.1:8000/candidates
```

## Chức năng sử dụng

- Danh sách ứng viên có phân trang.
- Tìm kiếm theo `full_name` bằng ô search.
- Lọc danh sách theo `status`.
- Thêm mới ứng viên qua form riêng.
- Xem chi tiết một ứng viên.
- Cập nhật thông tin ứng viên.
- Xóa ứng viên có xác nhận trước khi xóa.

## Seeder

Seeder `CandidateSeeder` tạo sẵn 20 bản ghi bằng `CandidateFactory` để kiểm tra nhanh giao diện CRUD, search, filter và pagination.

## Route chính

- `GET /candidates`
- `GET /candidates/create`
- `POST /candidates`
- `GET /candidates/{candidate}`
- `GET /candidates/{candidate}/edit`
- `PUT /candidates/{candidate}`
- `DELETE /candidates/{candidate}`

## Ghi chú

- Search và filter được giữ lại khi chuyển trang.
- Validation được xử lý bằng Form Request để controller gọn hơn.
