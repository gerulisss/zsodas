@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Priziuretojo sukurimas</div>
                <div class="card-body">
<form method="POST" action="{{route('manager.store')}}">
    Name: <input type="text" name="manager_name" value="{{old('manager_name')}}" class="form-control">
    Surname: <input type="text" name="manager_surname" class="form-control">
    <br>
    <select name="specie_id" class="selectpicker form-control">
        @foreach ($species as $specie)
            <option value="{{$specie->id}}">{{$specie->name}}</option>
        @endforeach
 </select>
 <br>
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