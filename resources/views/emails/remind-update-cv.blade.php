<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reminder to Update Your CV</title>
</head>

<body style="margin:0;padding:0;background:#f4f6f9;font-family:Arial,Helvetica,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f9;padding:40px 0;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff;border-radius:8px;overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td align="center"
                            style="background:#0d6efd;color:#ffffff;padding:25px;font-size:24px;font-weight:bold;">
                            Candidate Management
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:35px;line-height:1.8;color:#333333;">

                            <h2 style="margin-top:0;">
                                Hello {{ $candidate->full_name }},
                            </h2>

                            <p>
                                We noticed that your profile does not have a CV uploaded yet.
                            </p>

                            <p>
                                Keeping your CV updated helps recruiters review your profile
                                and contact you for suitable opportunities.
                            </p>

                            <p>
                                Please log in to the Candidate Management System and upload
                                your latest CV at your earliest convenience.
                            </p>

                            <div style="text-align:center;margin:35px 0;">

                                <a href="{{ url('/') }}"
                                    style="
                                        background:#0d6efd;
                                        color:#ffffff;
                                        text-decoration:none;
                                        padding:14px 28px;
                                        border-radius:6px;
                                        display:inline-block;
                                        font-weight:bold;
                                    ">
                                    Update My CV
                                </a>

                            </div>

                            <p>
                                If you have already uploaded your CV recently,
                                please ignore this email.
                            </p>

                            <hr style="border:none;border-top:1px solid #eeeeee;margin:30px 0;">

                            <p style="margin-bottom:0;">
                                Best regards,
                            </p>

                            <strong>
                                Candidate Management Team
                            </strong>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center"
                            style="background:#f8f9fa;color:#888888;padding:20px;font-size:13px;">

                            This is an automated email. Please do not reply.

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
