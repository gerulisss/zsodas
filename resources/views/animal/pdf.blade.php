<!doctype html>
<html lang="lt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{$animal->name}}</title>



</head>

<style>
    @font-face {
    font-family: 'Roboto';
    font-style: normal;
    font-weight: 400;
    src: url({{ asset('fonts/Roboto-Regular.ttf') }});
    }
    @font-face {
    font-family: 'Roboto';
    font-style: normal;
    font-weight: bold;
    src: url({{ asset('fonts/Roboto-Bold.ttf') }});
    }

    * {
        font-family: 'Roboto'!important;
    }
</style>
</body>
<h1>Gyvūno aprašymas</h1>
<h4>
    Name: {{$animal->name}}<br>
    Birth year: {{$animal->birth_year}}<br>
</h4>
    Animal book: {!!$animal->animal_book!!}<br>
    <h3>
    Specie: {{$animal->specie->name}}
    <br>
    Manager: {{$animal->manager->name.' '.$animal->manager->surname}}
    </h3>

</body>
</html>