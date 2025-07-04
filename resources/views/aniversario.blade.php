<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aniversários dos Seinenkai</title>
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
            max-width: 1200px;
            text-align: center;
        }

        .birthday-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1rem;
        }

        .birthday-item {
            background-color: #fff;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            color: #34495e;
            font-size: 1rem;
            line-height: 1.6;
        }

        .highlight {
            color: #e74c3c;
            font-weight: bold;
        }

        .gif-container {
            margin-top: 2rem;
        }

        @media (max-width: 1200px) {
            .birthday-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 900px) {
            .birthday-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .birthday-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contador de Aniversários dos Seinenkai</h1>

        <div class="birthday-grid">
            @php
$birthdays = [
    ['name' => 'Rissa Sato', 'date' => '02/01'],
    ['name' => 'Andre Portela', 'date' => '30/09'],
    ['name' => 'Analu', 'date' => '06/01'],
    ['name' => 'José Gabriel', 'date' => '31/01'],
    ['name' => 'Marcel', 'date' => '05/02'],
    ['name' => 'Duda', 'date' => '24/02'],
    ['name' => 'Luigi', 'date' => '24/02'],
    ['name' => 'Leon', 'date' => '04/03'],
    ['name' => 'Aécio', 'date' => '04/03'],
    ['name' => 'Diana Dias', 'date' => '04/03'],
    ['name' => 'Jhon Carlos', 'date' => '06/03'],
    ['name' => 'Joyce Neri', 'date' => '23/03'],
    ['name' => 'Raphael Maiffre', 'date' => '31/03'],
    ['name' => 'Iasmin', 'date' => '04/04'],
    ['name' => 'Alice Kimie', 'date' => '10/05'],
    ['name' => 'Marcela Almeida', 'date' => '20/05'],
    ['name' => 'Marcelo Tanaka', 'date' => '02/06'],
    ['name' => 'Juliana Tanaka', 'date' => '15/07'],
    ['name' => 'Maria', 'date' => '23/07'],
    ['name' => 'Lara', 'date' => '26/07'],
    ['name' => 'Anthony', 'date' => '28/07'],
    ['name' => 'Rafa Grassi', 'date' => '30/07'],
    ['name' => 'Ananda', 'date' => '02/08'],
    ['name' => 'Nath', 'date' => '08/08'],
    ['name' => 'Isabella', 'date' => '09/08'],
    ['name' => 'José Bruno', 'date' => '13/08'],
    ['name' => 'Lucas Barbosa', 'date' => '25/08'],
    ['name' => 'Clarice Eiko', 'date' => '18/09'],
    ['name' => 'Daniel Habib', 'date' => '30/09'],
    ['name' => 'Lucas Argolo', 'date' => '12/10'],
    ['name' => 'Leo', 'date' => '15/10'],
    ['name' => 'Gabriel', 'date' => '23/10'],
    ['name' => 'Jackson', 'date' => '27/10'],
    ['name' => 'Felipe', 'date' => '29/10'],
    ['name' => 'Hani', 'date' => '15/11'],
    ['name' => 'Yuemei', 'date' => '29/11']
];


                $currentYear = now()->year;

                // Função para converter a data de aniversário para o formato Y-m-d
                function getBirthdayDate($date, $year) {
                    $parts = explode('/', $date);
                    return now()->year($year)->month($parts[1])->day($parts[0]);
                }

                // Ordenar aniversários
                usort($birthdays, function($a, $b) use ($currentYear) {
                    $dateA = getBirthdayDate($a['date'], $currentYear);
                    $dateB = getBirthdayDate($b['date'], $currentYear);

                    if ($dateA < now()) {
                        $dateA->addYear();
                    }

                    if ($dateB < now()) {
                        $dateB->addYear();
                    }

                    return $dateA <=> $dateB;
                });

                foreach ($birthdays as $birthday) {
                    $birthdayThisYear = getBirthdayDate($birthday['date'], $currentYear);
                    $nextBirthday = $birthdayThisYear->format('Y-m-d');

                    if ($nextBirthday < now()) {
                        $nextBirthday = $birthdayThisYear->addYear();
                    }

                    $diff = now()->diff($nextBirthday);

                    $daysRemaining = $diff->format('%a');
                    $hoursRemaining = $diff->h;
                    $minutesRemaining = $diff->i;
            @endphp

            <div class="birthday-item">
                Próximo aniversário de:<br> <span class="highlight">{{ $birthday['name'] }}</span> em <span class="highlight">{{ $nextBirthday }}</span>:
                faltam <span class="highlight">{{ $daysRemaining }}</span> dias,
                <span class="highlight">{{ $hoursRemaining }}</span> horas e
                <span class="highlight">{{ $minutesRemaining }}</span> minutos.
            </div>

            @php
                }
            @endphp
        </div>

        <div class="gif-container">
            <div class="tenor-gif-embed" data-postid="8075569" data-share-method="host" data-aspect-ratio="1.77778" data-width="100%">
                <a href="https://tenor.com/view/johncena-john-cena-fandango-dancing-gif-8075569">Johncena John GIF</a> from
                <a href="https://tenor.com/search/johncena-gifs">Johncena GIFs</a>
            </div>
            <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
        </div>
    </div>
</body>
</html>
