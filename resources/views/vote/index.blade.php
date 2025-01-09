<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Vote for Your Option</h1>
        <form action="{{ route('vote.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="code">Enter Your Code:</label>
                <input type="text" id="code" name="code" required>
            </div>
            <div class="form-group">
                <label for="option">Choose an Option:</label>
                <select id="option" name="option" required>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
            </div>
            <button type="submit">Vote</button>
        </form>
    </div>
</body>
</html>