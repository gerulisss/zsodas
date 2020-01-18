@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Gyvūno aprašymas</div>
    <div class="card-body">
        <div class="form-group">
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

            <br>

            <a href="{{route('animal.pdf', [$animal])}}"><button type="submit" class="btn btn-primary btn-sm">Atsisiųsti pdf</button></a>
            <a class="btn btn-success btn-sm" href="{{route('animal.index')}}">Grįžti į gyvūnų sąrašą</a>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection