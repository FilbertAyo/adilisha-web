<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #f8f9fa; padding: 20px; border-radius: 5px; margin-bottom: 20px;">
        <h2 style="color: #2c3e50; margin-top: 0;">New Contact Form Submission</h2>
    </div>

    <div style="background-color: #ffffff; padding: 20px; border: 1px solid #e0e0e0; border-radius: 5px;">
        <p><strong>Name:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> <a href="mailto:{{ $email }}">{{ $email }}</a></p>
        <p><strong>Subject:</strong> {{ $subject }}</p>
        
        <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e0e0e0;">
            <strong>Message:</strong>
            <div style="margin-top: 10px; padding: 15px; background-color: #f8f9fa; border-radius: 3px; white-space: pre-wrap;">{{ $message }}</div>
        </div>
    </div>

    <div style="margin-top: 20px; padding: 15px; background-color: #e8f4f8; border-radius: 5px; font-size: 12px; color: #666;">
        <p style="margin: 0;">This email was sent from the contact form on {{ config('app.name') }} website.</p>
        <p style="margin: 5px 0 0 0;">You can reply directly to this email to respond to {{ $name }}.</p>
    </div>
</body>
</html>
