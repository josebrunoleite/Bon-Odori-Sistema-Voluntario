<!DOCTYPE html>
<html>
<head>
    <title>Aniversários</title> 
</head>
<body>
    <h1>Contador de Aniversários dos Seinenkai</h1>

    @php
        $birthdays = [
    ['name' => 'Rissa Sato', 'date' => '02/01'],
    ['name' => 'Analu', 'date' => '06/01'],
    ['name' => 'José Gabriel', 'date' => '31/01'],
    ['name' => 'Marcel', 'date' => '05/02'],
    ['name' => 'Duda', 'date' => '24/02'],
    ['name' => 'Luigi', 'date' => '24/02'],
    ['name' => 'Leon', 'date' => '04/03'],
    ['name' => 'Aécio', 'date' => '04/03'],
    ['name' => 'Diana Dias', 'date' => '04/03'],
    ['name' => 'Jhon Carlos', 'date' => '06/03'],
    ['name' => 'Iasmin', 'date' => '04/04'],
    ['name' => 'Alice Kimie', 'date' => '10/05'],
    ['name' => 'Marcela Almeida', 'date' => '20/05'],
    ['name' => 'Maria', 'date' => '23/07'],
    ['name' => 'Lara', 'date' => '26/07'],
    ['name' => 'Anthony', 'date' => '28/07'],
    ['name' => 'Rafa Grassi', 'date' => '30/07'],
    ['name' => 'Ananda', 'date' => '02/08'],
    ['name' => 'Nath', 'date' => '08/08'],
    ['name' => 'Isabella', 'date' => '09/08'],
    ['name' => 'José Bruno', 'date' => '13/08'],
    ['name' => 'Rafael', 'date' => '20/08'],
    ['name' => 'Lucas Barbosa', 'date' => '25/08'],
    ['name' => 'Clarice Eiko', 'date' => '18/09'],
    ['name' => 'Daniel Habib', 'date' => '30/09'],
    ['name' => 'Lucas Argolo', 'date' => '12/10'],
    ['name' => 'Ana', 'date' => '14/10'],
    ['name' => 'Leo', 'date' => '15/10'],
    ['name' => 'Gabriel', 'date' => '23/10'],
    ['name' => 'Jackson', 'date' => '27/10'],
    ['name' => 'Felipe', 'date' => '29/10'],
    ['name' => 'Hani', 'date' => '15/11'],
    ['name' => 'Yuemei', 'date' => '29/11']
];


        $currentYear = now()->year;

        foreach ($birthdays as $birthday) {
            $birthdayThisYear = now()->year($currentYear)->month(explode('/', $birthday['date'])[1])->day(explode('/', $birthday['date'])[0]);
            $nextBirthday = $birthdayThisYear->format('Y-m-d');

            if ($nextBirthday < now()) {
                $nextBirthday = $birthdayThisYear->addYear();
            }

            $diff = now()->diff($nextBirthday);

            $daysRemaining = $diff->format('%a');
            $hoursRemaining = $diff->h;
            $minutesRemaining = $diff->i;
    @endphp

    <ul>
        <li>
            Próximo aniversário de {{ $birthday['name'] }} em {{ $nextBirthday }}:
            Faltam {{ $daysRemaining }} dias,
            {{ $hoursRemaining }} horas e
            {{ $minutesRemaining }} minutos.
        </li>
    </ul>
    @php
        }
    @endphp
        <div class="tenor-gif-embed" data-postid="8075569" data-share-method="host" data-aspect-ratio="1.77778" data-width="75%"><a href="https://tenor.com/view/johncena-john-cena-fandango-dancing-gif-8075569">Johncena John GIF</a>from <a href="https://tenor.com/search/johncena-gifs">Johncena GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>       

</body>
</html>

