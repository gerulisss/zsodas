@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prižiūrėtojo sukūrimas</div>
                <div class="card-body">
<form method="POST" action="{{route('manager.store')}}">
    Name: <input type="text" name="manager_name" value="{{old('manager_name')}}" class="form-control">
    Surname: <input type="text" name="manager_surname" class="form-control">
    Select specie: <select name="specie_id" class="selectpicker form-control">
        @foreach ($species as $specie)
            <option value="{{$specie->id}}">{{$specie->name}}</option>
        @endforeach
 </select>
 <br>
    @csrf
    <button type="submit" class="btn btn-primary btn-sm">Sukurti</button>
    <a class="btn btn-success btn-sm" href="{{route('manager.index')}}">Grįžti į prižiūrėtojų sąrašą</a>
 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection