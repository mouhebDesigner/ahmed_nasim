<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- list of travail -->
    @foreach($travails as $travail)
        <a href="{{ url('downloadTravail/'.$travail->id) }}">
          {{$travail->user->nom}}

        </a>
    @endforeach
</body>
</html>