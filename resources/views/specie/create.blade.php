@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvunu rusies sukurimas</div>
                <div class="card-body">
 
<form method="POST" action="{{route('specie.store')}}">
    <br>
    Name: <input type="text" name="specie_name">
    @csrf
    <button type="submit">Sukurti</button>
 </form>
 @endsection
</div>
</div>
</div>
</div>
</div>

