@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Priziuretojo sukurimas</div>
                <div class="card-body">

                    @if(session()->has('success_message'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success_message')}}
    </div>
@endif
<form method="POST" action="{{route('manager.store')}}">
    Name: <input type="text" name="manager_name">
    Surname: <input type="text" name="manager_surname">
    <select name="specie_id">
        @foreach ($species as $specie)
            <option value="{{$specie->id}}">{{$specie->name}}</option>
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