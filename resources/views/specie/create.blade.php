@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvūnų rūšies sukūrimas</div>
                <div class="card-body">
                    <div class="form-group">
 
<form method="POST" action="{{route('specie.store')}}">
    <br>
    Name: <input type="text" name="specie_name" value="{{old('specie_name')}}" class="form-control">
    <br>
    @csrf
    <button type="submit" class="btn btn-primary btn-sm">Sukurti</button>
    <a class="btn btn-success btn-sm" href="{{route('specie.index')}}">Grįžti į rūšių sąrašą</a>
 </form>
</div>
 @endsection
</div>
</div>
</div>
</div>
</div>

