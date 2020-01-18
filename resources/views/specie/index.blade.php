@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvūnų rūšių sąrašas
                    <a class="btn btn-primary btn-sm" href="{{route('specie.create')}}">Sukurti nauja</a>
                </div>
                <div class="card-body">
                @foreach ($species as $specie)
                <form method="POST" action="{{route('specie.destroy', [$specie])}}">
                    @csrf
                {{$specie->name}}
            {{-- Rūšis: <a href="{{route('specie.edit',[$specie])}}">{{$specie->name}}</a> --}}
            <a style="text-decoration:none;" href="{{route('specie.edit',[$specie])}}"><button type="button" class="btn btn-primary btn-sm">Redaguoti</button></a>
              <button type="submit" class="btn btn-danger btn-sm">Ištrinti</button>
              </form>
              <br>
            @endforeach

            </div>
        </div>
    </div>
</div>
</div>
@endsection