<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Validation</title>

    <style>
        .cadre{
            width: 500px;
        }
    </style>

</head>
<body>
    <h2>{{ $mailData['titre'] }}</h2>
    <div class="cadre">
        <p>{{ $mailData['para'] }}<br/>{{ $mailData['body'] }}</p>
        <p>Cliquez sur le lien suivant pour finaliser votre inscription :
            <a href="{{ $mailData['link'] }}">Créer compte pour vous</a>
            <br/>Nous vous attendons avec impatience !
        </p>
        <p>Cordialement<br/>Service d'accueil</p>
    </div>
</body>
</html>
