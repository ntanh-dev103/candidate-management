@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4 p-md-5 text-center">
                    <div class="mb-3">
                        <span class="badge bg-success-subtle text-success px-3 py-2">Đã kích hoạt</span>
                    </div>
                    <h1 class="h3 fw-bold mb-3">Tài khoản của {{ $candidate->full_name }} đã được kích hoạt</h1>
                    <p class="text-muted mb-4">Bạn có thể đóng trang này và tiếp tục làm việc với hồ sơ ứng viên như bình thường.</p>
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('dashboard') }}" class="btn btn-dark px-4">Về dashboard</a>
                        <a href="{{ route('candidates.index') }}" class="btn btn-outline-secondary px-4">Danh sách ứng viên</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
