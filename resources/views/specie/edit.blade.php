@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvūnų rūšies redagavimas</div>
                    <div class="card-body">
                <br>
                <form method="POST" action="{{route('specie.update',[$specie])}}">
                    Name: <input type="text" name="specie_name" class="form-control" value="{{$specie->name}}">
                    <br>
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">Redaguoti</button>
                    <a class="btn btn-success btn-sm" href="{{route('specie.index')}}">Grįžti į rūšių sąrašą</a>

                 </form>
                 <br>

            </div>
        </div>
    </div>
</div>
</div>
@endsection