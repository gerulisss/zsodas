@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvūno redagavimas</div>
                <div class="card-body">
<form method="POST" action="{{route('animal.update',[$animal])}}">
    Name: <input type="text" name="animal_name" class="form-control" value="{{$animal->name}}">
    Birth year: <input type="text" name="animal_birth_year" class="form-control" value="{{$animal->birth_year}}">
    Animal book: <textarea name="animal_book" class="form-control">{{$animal->animal_book}}</textarea>
    Select specie: <select name="specie_id" class="selectpicker form-control">
        @foreach ($species as $specie)
            <option value="{{$specie->id}}" @if($specie->id == $animal->specie_id) selected @endif>
                {{$specie->name}}
            </option>
        @endforeach
</select>
Select manager: <select name="manager_id" class="selectpicker form-control">
    @foreach ($managers as $manager)
        <option value="{{$manager->id}}" @if($manager->id == $animal->manager_id) selected @endif>
            {{$manager->name}} {{$manager->surname}}
        </option>
    @endforeach
</select>
<br>
    @csrf
    <button type="submit" class="btn btn-primary btn-sm">Redaguoti</button>
    <a class="btn btn-success btn-sm" href="{{route('animal.index')}}">Grįžti į gyvūnų sąrašą</a>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection