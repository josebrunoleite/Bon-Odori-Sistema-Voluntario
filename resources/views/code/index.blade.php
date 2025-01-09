<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receber Código</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 1rem;
            text-align: center;
        }

        .container {
            width: 80%;
            max-width: 600px;
            text-align: center;
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1rem;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #34495e;
        }

        input[type="email"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background-color: #2980b9;
        }

        p {
            margin: 1rem 0;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Receba Seu Código</h1>
        @if (session('success'))
        <h1>Seu código é</h1>
            <p class="success">{{ session('success') }}</p>
            <a href="{{ route('vote.index', ['code' => session('success')]) }}">
                <button type="button">Votar agora!</button>
            </a>
        @endif
        @if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
        <form action="{{ route('code.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit">Obter Código</button>
        </form>
    </div>
</body>
</html>