<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RiArreda</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #efe9e6;
            margin: 0;
            padding: 0;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgb(255, 255, 255);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2em;
            color: #004766;
            text-align: center;
        }
        h2 {
            font-size: 1.5em;
            color:#004766;
            margin-bottom: 15px;
        }
        p {
            font-size: 1.1em;
            color: #000000;
            margin: 10px 0;
        }
        a {
            display: inline-block;
            padding: 12px 20px;
            background-color: #004766;
            color: #ffffff;
            text-decoration: none;
            font-size: 1.1em;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .highlight {
            color: #004766;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('img/watermark2.png') }}" alt="">
        <h1>Un utente ha chiesto di lavorare con noi!</h1>
        <h2>Ecco i suoi dati:</h2>
        <p>Nome: <span class="highlight">{{$user->name}}</span></p>
        <p>Cognome: <span class="highlight">{{$user->surname}}</span></p>
        <p>Email: <span class="highlight">{{$user->email}}</span></p>
        <p>Se vuoi renderl* revisore clicca qui:</p>
        <a href="{{route('make.revisor', compact('user'))}}">Rendi revisore</a>
    </div>
</body>
</html>
