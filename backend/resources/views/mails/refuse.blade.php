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
            background-color: beige
        }
    </style>
</head>

<body>
    <h1>{{ $mailData['titre'] }}</h1>
    <div class="cadre">
        <p>{{ $mailData['para'] }} <br/>{{ $mailData['body'] }} </p>
        <p>Cordialement,</p>
        <p>Service de secretaire</p>
    </div>
</body>

</html>
