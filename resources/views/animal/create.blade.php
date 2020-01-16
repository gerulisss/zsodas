@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvuno sukurimas</div>
                <div class="card-body">
<form method="POST" action="{{route('animal.store')}}">
    Name: <input type="text" name="animal_name" class="form-control">
    Birth year: <input type="text" name="animal_birth_year" value="{{old('animal_birth_year')}}" class="form-control">
    Animal book: <textarea name="animal_book" class="form-control"></textarea>
    <br>
    <select name="specie_id" class="selectpicker form-control">
        @foreach ($species as $specie)
            <option value="{{$specie->id}}">{{$specie->name}}</option>
        @endforeach
 </select>
 <br>
 <select name="manager_id" class="selectpicker form-control">
    @foreach ($managers as $manager)
        <option value="{{$manager->id}}">{{$manager->name}} {{$manager->surname}}</option>
    @endforeach
</select>
<br>
    @csrf
    <button type="submit" class="btn btn-primary">Sukurti</button>
 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection