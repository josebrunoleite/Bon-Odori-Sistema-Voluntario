<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Certificate</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Voting Certificate</h1>
        <p>Thank you for participating in the voting process!</p>
        <p>Your vote has been successfully recorded.</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Vote Option:</strong> {{ $voteOption }}</p>
        <p><strong>Code:</strong> {{ $code }}</p>
        <p>Date: {{ date('Y-m-d H:i:s') }}</p>
    </div>
</body>
</html>