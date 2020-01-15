@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvunu rusies redagavimas</div>
                    <div class="card-body">
                <br>
                <form method="POST" action="{{route('specie.update',[$specie])}}">
                    Name: <input type="text" name="specie_name" value="{{$specie->name}}">
                    @csrf
                    <button type="submit">Redaguoti</button>
                 </form>
                 <br>

            </div>
        </div>
    </div>
</div>
</div>
@endsection