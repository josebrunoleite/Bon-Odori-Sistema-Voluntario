<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado</title>
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

        .container {
            width: 80%;
            max-width: 600px;
            text-align: center;
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        p {
            margin: 1rem 0;
            font-size: 1.1rem;
        }

        .highlight {
            color: #3498db;
            font-weight: 600;
        }

        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 1rem;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Certificado de Votação</h1>
        <p>Obrigado por votar! Seu código é: <strong class="highlight">{{ $code }}</strong></p>
        <p>Você votou em: <strong class="highlight">{{ $option }}</strong></p>
        <button onclick="downloadCertificate()">Baixar Certificado</button>
    </div>

    <script>
        function downloadCertificate() {
            const element = document.createElement('a');
            const file = new Blob([document.querySelector('.container').outerHTML], {type: 'text/html'});
            element.href = URL.createObjectURL(file);
            element.download = 'certificado.html';
            document.body.appendChild(element);
            element.click();
            document.body.removeChild(element);
        }
    </script>
</body>
</html>