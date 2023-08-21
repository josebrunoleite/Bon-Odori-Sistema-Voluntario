<!DOCTYPE html>
<html>
<head>
    <title>Aniversários</title>
</head>
<body>
    <h1>Contador de Aniversários do Seinenkai</h1>

    @php
        $birthdays = [
            ['name' => 'José Bruno', 'date' => '13/08'],
            ['name' => 'Nath', 'date' => '08/08'],
            ['name' => 'Lucas Barbosa', 'date' => '25/08'],
            ['name' => 'Gabriel', 'date' => '23/10'],
            ['name' => 'Lucas Argolo', 'date' => '12/10'],
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

</body>
</html>
