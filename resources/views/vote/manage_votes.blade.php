<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Votes</title>
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
            max-width: 800px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }

        th, td {
            padding: 0.75rem;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background-color: #c0392b;
        }

        .success {
            color: green;
            margin-bottom: 1rem;
        }

        .error {
            color: red;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Votes</h1>
        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Code</th>
                    <th>Choice</th>
                    <th>IP Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($votes) --}}
                @foreach ($votes as $vote)
                    <tr>
                        <td>{{ $vote->email }}</td>
                        <td>{{ $vote->user_code }}</td>
                        <td>
                            @php
                                $selectedOptions = collect($vote->getAttributes())->filter(function($value, $key) {
                                    return $value === 'Sim' && !in_array($key, ['id', 'user_code', 'ip_address', 'created_at', 'updated_at', 'email']);
                                });
                            @endphp
                            <p>Você votou em: <strong class="highlight">{{ implode(', ', $selectedOptions->keys()->toArray()) }}</strong></p>
                        </td>
                        <td>{{ $vote->ip_address }}</td>
                        <td>
                            <form action="{{ route('votes.destroy', $vote->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>