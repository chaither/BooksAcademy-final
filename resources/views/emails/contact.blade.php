<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">
    <h2>New Contact Form Submission</h2>
    <p>You have received a new message from the BooksAcademy contact form.</p>
    
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold; width: 150px;">Name</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $data['name'] }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">Email</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ $data['email'] }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">Inquiry Type</td>
            <td style="padding: 10px; border: 1px solid #ddd;">{{ ucfirst($data['inquiry_type']) }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">Message</td>
            <td style="padding: 10px; border: 1px solid #ddd; white-space: pre-wrap;">{{ $data['message'] }}</td>
        </tr>
    </table>

    <br>
    <p><em>This email was generated automatically by the BooksAcademy contact form. You can reply directly to this email to contact the user.</em></p>
</body>
</html>
