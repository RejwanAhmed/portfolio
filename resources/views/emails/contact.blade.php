<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Message</title>
</head>
<body style="font-family: sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 10px;">
        <h2 style="color: #333;">New Message From My Portofolio</h2>
        <p><strong>Name:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        @if(!empty($data['subject']))
            <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
        @endif
        <p><strong>Message:</strong></p>
        <p style="white-space: pre-line;">{{ $data['message'] }}</p>
    </div>
</body>
</html>
