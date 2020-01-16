@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvunu rusies sukurimas</div>
                <div class="card-body">
                    <div class="form-group">
 
<form method="POST" action="{{route('specie.store')}}">
    <br>
    Name: <input type="text" name="specie_name" value="{{old('specie_name')}}" class="form-control">
    <br>
    @csrf
    <button type="submit" class="btn btn-primary">Sukurti</button>
 </form>
</div>
 @endsection
</div>
</div>
</div>
</div>
</div>

