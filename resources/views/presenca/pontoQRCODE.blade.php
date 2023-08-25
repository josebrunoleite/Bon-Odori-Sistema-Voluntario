<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link para o CSS do Bootstrap (substitua pelo seu próprio link) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .qr-code-container {
            position: relative;
            max-width: 500px;
        }

        .red-box {
            width: 100%;
            height: 100%;
            background-color: red;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .qr-code {
            max-width: 100%;
            max-height: 100%;
        }

        .reload-button {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 2;
        }
    </style>
    <title>Aqui seu QRCODE</title>
</head>

<body>
    <button class="btn btn-primary reload-button mb-10" onclick="location.reload();">Atualizar</button>

    @if(Auth::check() and (Auth::user()->isAdmin() == true))
    <div class="qr-code-container">
        <div class="red-box">
{{codigo}}
            {!! QrCode::size(600)->generate('https://seinenkai.com.br/qrcode?codigo='.$codigo) !!}
        </div>
        <hr>
    </div>

    <!-- Scripts do Bootstrap (substitua pelos seus próprios links) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endif
</body>

</html>
