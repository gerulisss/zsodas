@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prižiūrėtojo redagavimas</div>
                <div class="card-body">
                    <form method="POST" action="{{route('manager.update',[$manager])}}">
                        Name: <input type="text" name="manager_name" class="form-control" value="{{$manager->name}}">
                        Surname: <input type="text" name="manager_surname" class="form-control" value="{{$manager->surname}}">
                        Select specie: <select class="selectpicker form-control" name="specie_id">
                            @foreach ($species as $specie)
                                <option value="{{$specie->id}}" @if($specie->id == $manager->specie_id) selected @endif>
                                    {{$specie->name}} 
                                </option>
                            @endforeach
                    </select>
                        @csrf
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">Redaguoti</button>
                        <a class="btn btn-success btn-sm" href="{{route('manager.index')}}">Grįžti į prižiūrėtojų sąrašą</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection