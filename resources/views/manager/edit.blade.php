@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Priziuretojo redagavimas</div>
                <div class="card-body">
                    @if(session()->has('success_message'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success_message')}}
            </div>
        @endif
                    <form method="POST" action="{{route('manager.update',[$manager])}}">
                        Name: <input type="text" name="manager_name" value="{{$manager->name}}">
                        Surname: <input type="text" name="manager_surname" value="{{$manager->surname}}">
                        <select name="specie_id">
                            @foreach ($species as $specie)
                                <option value="{{$specie->id}}" @if($specie->id == $manager->specie_id) selected @endif>
                                    {{$specie->name}} 
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