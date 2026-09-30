<!DOCTYPE html>
<html>
<head>
    <title>Reply to your Contact Enquiry</title>
</head>
<body>
    <h2>Hello {{ $enquiry->name }},</h2>
    <p>Thank you for contacting us. We have received your enquiry:</p>
    <blockquote style="border-left: 4px solid #ccc; margin-left: 0; padding-left: 10px;">
        {{ $enquiry->message }}
    </blockquote>
    
    <p><strong>Our Reply:</strong></p>
    <p>{!! nl2br(e($replyMessage)) !!}</p>
    
    <br>
    <p>Best Regards,</p>
    <p>The {{ config('app.name') }} Team</p>
</body>
</html>
