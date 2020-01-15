@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvuno redagavimas</div>
                <div class="card-body">
<form method="POST" action="{{route('animal.update',[$animal])}}">
    Name: <input type="text" name="animal_name" value="{{$animal->name}}">
    Birth year: <input type="text" name="animal_birth_year" value="{{$animal->birth_year}}">
    <br>
    <br>
    Animal book: <textarea name="animal_book">{{$animal->animal_book}}</textarea>
    <select name="specie_id">
        @foreach ($species as $specie)
            <option value="{{$specie->id}}" @if($specie->id == $animal->specie_id) selected @endif>
                {{$specie->name}}
            </option>
        @endforeach
</select>

<select name="manager_id">
    @foreach ($managers as $manager)
        <option value="{{$manager->id}}" @if($manager->id == $animal->manager_id) selected @endif>
            {{$manager->name}} {{$manager->surname}}
        </option>
    @endforeach
</select>
    @csrf
    <button type="submit">Redaguoti</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection