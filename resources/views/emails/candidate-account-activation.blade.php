<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kích hoạt tài khoản ứng viên</title>
</head>
<body style="margin:0;padding:0;background:#eef2ff;font-family:Arial,Helvetica,sans-serif;color:#111827;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:linear-gradient(180deg,#eef2ff 0%,#f8fafc 52%,#eef2ff 100%);padding:40px 16px;">
    <tr>
        <td align="center">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:680px;background:#ffffff;border-radius:24px;overflow:hidden;box-shadow:0 24px 60px rgba(15,23,42,.12);border:1px solid #e5e7eb;">
                <tr>
                    <td style="background:linear-gradient(135deg,#0f172a 0%,#1f2937 50%,#111827 100%);padding:30px 32px;color:#fff;position:relative;">
                        <div style="display:inline-flex;align-items:center;gap:14px;">
                            <div style="width:52px;height:52px;border-radius:16px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;font-size:20px;font-weight:800;letter-spacing:.02em;">
                                {{ strtoupper(substr(config('app.name'), 0, 2)) }}
                            </div>
                            <div>
                                <div style="font-size:13px;letter-spacing:.16em;text-transform:uppercase;opacity:.75;">{{ config('app.name') }}</div>
                                <div style="font-size:14px;opacity:.78;margin-top:4px;">Thông báo kích hoạt tài khoản ứng viên</div>
                            </div>
                        </div>
                        <div style="font-size:28px;font-weight:800;margin-top:22px;line-height:1.25;max-width:460px;">Tài khoản của bạn đã sẵn sàng để kích hoạt</div>
                    </td>
                </tr>
                <tr>
                    <td style="padding:34px 32px 28px;">
                        <p style="margin:0 0 14px;font-size:16px;line-height:1.75;color:#111827;">Xin chào <strong>{{ $candidate->full_name }}</strong>,</p>
                        <p style="margin:0 0 22px;font-size:15px;line-height:1.75;color:#4b5563;">Đội ngũ tuyển dụng của {{ config('app.name') }} vừa tạo cho bạn một tài khoản ứng viên. Vui lòng kích hoạt trong vòng <strong>48 giờ</strong> để đảm bảo liên kết còn hiệu lực.</p>

                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f8fafc;border:1px solid #e5e7eb;border-radius:18px;margin-bottom:22px;">
                            <tr>
                                <td style="padding:22px;">
                                    <div style="font-size:13px;color:#6b7280;text-transform:uppercase;letter-spacing:.1em;margin-bottom:12px;font-weight:700;">Thông tin tài khoản</div>
                                    <div style="font-size:15px;line-height:1.95;color:#111827;">
                                        <div><strong>Họ và tên:</strong> {{ $candidate->full_name }}</div>
                                        <div><strong>Email đăng nhập:</strong> {{ $candidate->email }}</div>
                                        <div><strong>Trạng thái:</strong> Chờ kích hoạt</div>
                                        <div><strong>Hạn kích hoạt:</strong> {{ $expiresAt }}</div>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <div style="text-align:center;margin:30px 0 14px;">
                            <a href="{{ $activationUrl }}" style="display:inline-block;background:linear-gradient(135deg,#111827 0%,#334155 100%);color:#ffffff;text-decoration:none;padding:15px 30px;border-radius:999px;font-weight:700;font-size:15px;box-shadow:0 12px 24px rgba(15,23,42,.18);">Kích hoạt tài khoản ngay</a>
                        </div>

                        <p style="margin:0 0 10px;font-size:14px;line-height:1.7;color:#6b7280;">Nếu nút không hoạt động, bạn có thể sao chép đường dẫn bên dưới vào trình duyệt:</p>
                        <div style="margin:0 0 24px;padding:14px 16px;background:#eff6ff;border:1px solid #dbeafe;border-radius:14px;word-break:break-all;font-size:13px;line-height:1.7;color:#1d4ed8;">{{ $activationUrl }}</div>

                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-top:4px;border-top:1px solid #e5e7eb;">
                            <tr>
                                <td style="padding-top:18px;">
                                    <p style="margin:0 0 10px;font-size:14px;line-height:1.7;color:#6b7280;">Nếu bạn không yêu cầu tài khoản này, vui lòng bỏ qua email. Liên kết kích hoạt sẽ hết hạn sau 48 giờ và không thể sử dụng lại.</p>
                                    <p style="margin:0;font-size:14px;line-height:1.7;color:#111827;">Trân trọng,<br><strong>{{ config('app.name') }}</strong></p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
