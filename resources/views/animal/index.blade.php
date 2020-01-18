@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvūnų sąrašas
                    <a class="btn btn-primary btn-sm" href="{{route('animal.create')}}">Sukurti nauja</a>
                </div>
                <div class="card-body">
                    <form action="{{route('animal.index')}}" method="GET">
                        <select name="filter">
                            <option value="0">Visi prižiurėtojai</option>
                            @foreach ($managers as $managers)
                            <option value="{{$managers->id}}" @if($managers->id == $filter){{'selected'}}@endif>{{$managers->name}} {{$managers->surname}}</option>
                            @endforeach
                        </select>
                        <select name="sort">
                            @foreach ($sorts as $sort)
                            <option value="{{$sort->value}}" @if($sort->value == $sortDef){{'selected'}}@endif>{{$sort->text}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-success btn-sm" type="submit">Rušiuoti</button>
                        <a class="btn btn-danger btn-sm" href="{{route('animal.index')}}">Išvalyti</a>
                        </form>
                        <br>
@foreach ($animals as $animal)
     {{-- {{$animal->specie->name}}
      {{$animal->manager->name}}
       {{$animal->manager->surname}} --}}
       <form method="POST" action="{{route('animal.destroy', [$animal])}}">
        @csrf
        <a href="{{route('animal.edit',[$animal])}}">
            <a style="text-decoration:none;" href="{{route('animal.show',[$animal])}}">
            {{$animal->name}}
        </a>
        Atnaujinta: {{$animal->created_at}}
    <a style="text-decoration:none;" href="{{route('animal.edit',[$animal])}}"><button type="button" class="btn btn-primary btn-sm">Redaguoti</button></a>
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
