@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvuno sukurimas</div>
                <div class="card-body">
                    @if(session()->has('success_message'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success_message')}}
            </div>
        @endif
<form method="POST" action="{{route('animal.store')}}">
    Name: <input type="text" name="animal_name">
    Birth year: <input type="text" name="animal_birth_year">
    <br>
    <br>
    Animal book: <textarea name="animal_book"></textarea>
    <select name="specie_id">
        @foreach ($species as $specie)
            <option value="{{$specie->id}}">{{$specie->name}}</option>
        @endforeach
 </select>
 <select name="manager_id">
    @foreach ($managers as $manager)
        <option value="{{$manager->id}}">{{$manager->name}} {{$manager->surname}}</option>
    @endforeach
</select>
    @csrf
    <button type="submit">Sukurti</button>
 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection