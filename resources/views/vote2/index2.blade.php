<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votação</title>
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
            width: 90%;
            max-width: 800px;
            text-align: center;
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 2rem;
            text-align: left;
            border: 1px solid #e0e0e0;
            padding: 1rem;
            border-radius: 8px;
            background-color: #fafafa;
        }

        .candidate-name {
            font-weight: 600;
            font-size: 1.1rem;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .candidate-text {
            font-size: 0.9rem;
            line-height: 1.5;
            color: #555;
            margin-bottom: 1rem;
            text-align: justify;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #34495e;
        }

        input[type="text"],
        select {
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

        .code-group {
            margin-bottom: 2rem;
            text-align: left;
            background-color: #fff;
            padding: 1rem;
            border-radius: 8px;
            border: 2px solid #3498db;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Vote para quem ira na viagem do FIB!</h1>
        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
        <form action="{{ route('vote.store') }}" method="POST">
            @csrf
            <div class="code-group">
                <label for="code">Insira o código:</label>
                <input type="text" id="code" name="code" value="{{ request('code') }}" required>
            </div>
            
            <div class="form-group">
                <div class="candidate-name">Fernanda Nascimento Borges Caldas SSA✈GRU</div>
                <div class="candidate-text">
                    Tenho me dedicado ao Seinenkai de forma ativa e responsável, e acredito que posso representar nossa comunidade com comprometimento e atitude. Não fico esperando as coisas acontecerem, faço acontecer. Estou sempre presente e engajada nos projetos do Seinenkai, aprendendo com diretores e mentores, pronta para transformar todo esse conhecimento em ação real. Dediquei tempo, energia e coração para chegar até aqui, e agora é hora de mostrar que minha voz e minha força podem levar nossa comunidade mais longe. Quero representar o Seinenkai mostrando que nós, jovens, somos ativos, engajados e merecemos esse lugar de destaque.
                </div>
                <label for="fernanda">Seu voto:</label>
                <select id="fernanda" name="fernanda" required>
                    <option value="Nao">Não</option>
                    <option value="Sim">Sim</option>
                </select>
            </div>
            
            <div class="form-group">
                <div class="candidate-name">Alice Kimie Nakagawa Costa SSA✈GRU</div>
                <div class="candidate-text">
                    Atuo no Seinenkai e participo da ANISA há mais de dez anos. Nos últimos anos, venho me aproximando cada vez mais das atividades do Seinenkai, conciliando com outras responsabilidades. Vejo no FIB uma chance única de aprendizado e troca com outras lideranças nikkeis, que pode fortalecer nosso trabalho local. Tenho certeza de que os conhecimentos e vivências proporcionados pelo FIB me permitirão atuar de forma ainda mais efetiva na condução do Seinenkai e, futuramente, contribuir com a formação de novas lideranças, mantendo viva a essência e os valores que nos unem enquanto nikkeis.
                </div>
                <label for="alice">Seu voto:</label>
                <select id="alice" name="alice" required>
                    <option value="Nao">Não</option>
                    <option value="Sim">Sim</option>
                </select>
            </div>
            
            <div class="form-group">
                <div class="candidate-name">Giovanna Kamimura Mendes SSA✈GRU</div>
                <div class="candidate-text">
                    Em pouco tempo de participação no Seinenkai, dediquei-me ao crescimento e fortalecimento do grupo, sempre com responsabilidade, boa conduta e disposição para colaborar em tudo o que fosse necessário, ganhando reconhecimento e mais oportunidades para ajudar a Associação e nosso grupo. Tenho facilidade em me comunicar de forma respeitosa, o que me permite dialogar com diferentes perfis e construir pontes com segurança e empatia. Além disso, sou uma pessoa criativa, com ideias voltadas para projetos que visam o engajamento e a valorização da comunidade nikkei. Acredito que minha experiência anterior em uma comunidade nikkei de fora me proporcionou um olhar crítico e ao mesmo tempo admirado sobre o que vivemos em Salvador, com uma visão que pode enriquecer ainda mais nossa representação no FIB. Estou pronta para somar com postura, escuta ativa e iniciativa.
                </div>
                <label for="giovanna">Seu voto:</label>
                <select id="giovanna" name="giovanna" required>
                    <option value="Nao">Não</option>
                    <option value="Sim">Sim</option>
                </select>
            </div>
            
            <div class="form-group">
                <div class="candidate-name">Felipe Pinheiro SSA✈GRU</div>
                <div class="candidate-text">
                    Desejo representar da melhor forma o grupo com o objetivo de melhorar a relação do seinenkai com demais associações e parcerias mútuas, além de aumentar nossa visibilidade perante autoridades, demonstrando nossa força e engajamento.
                </div>
                <label for="felipe">Seu voto:</label>
                <select id="felipe" name="felipe" required>
                    <option value="Nao">Não</option>
                    <option value="Sim">Sim</option>
                </select>
            </div>
            
            <button type="submit">Votar</button>
        </form>
    </div>
</body>
</html>