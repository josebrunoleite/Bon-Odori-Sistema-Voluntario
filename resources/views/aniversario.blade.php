<!DOCTYPE html>
<html>
<head>
    <title>Aniversários</title> 
</head>
<body>
    <h1>Contador de Aniversários dos Seinenkai</h1>

    @php
        $birthdays = [
            ['name' => 'José Bruno', 'date' => '13/08'],
            ['name' => 'Nath', 'date' => '08/08'],
            ['name' => 'Lucas Barbosa', 'date' => '25/08'],
            ['name' => 'Gabriel', 'date' => '23/10'],
            ['name' => 'Lucas Argolo', 'date' => '12/10'],
            ['name' => 'Rafael', 'date' => '20/08'],
            ['name' => 'Ana ', 'date' => '14/10'],
            ['name' => 'Leon ', 'date' => '04/03'],
            ['name' => 'Aécio', 'date' => '04/03'],
            ['name' => 'José gabriel', 'date' => '31/01'],
            ['name' => 'Daniel habib', 'date' => '30/09'],

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

