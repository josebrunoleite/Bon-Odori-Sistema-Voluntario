<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Votação</title>
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

        .results {
            text-align: left;
        }

        .results h2 {
            color: #34495e;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .results ul {
            list-style: none;
            padding: 0;
        }

        .results li {
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultados da Votação</h1>
        <div class="results">
            <h2>Rissa - Marketing</h2>
            <ul>
                @foreach ($results['Rissa'] as $result)
                    <li>{{ $result->Rissa }}: {{ $result->total }}</li>
                @endforeach
            </ul>
            <h2>Aecio - Financeiro</h2>
            <ul>
                @foreach ($results['Aecio'] as $result)
                    <li>{{ $result->Aecio }}: {{ $result->total }}</li>
                @endforeach
            </ul>
            <h2>Jhon - Administrativo</h2>
            <ul>
                @foreach ($results['Jhon'] as $result)
                    <li>{{ $result->Jhon }}: {{ $result->total }}</li>
                @endforeach
            </ul>
            <h2>Lucas Barbosa - Diretor de Eventos</h2>
            <ul>
                @foreach ($results['Lucas'] as $result)
                    <li>{{ $result->Lucas }}: {{ $result->total }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>