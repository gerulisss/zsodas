@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvunu sarasas</div>
                <div class="card-body">
                    <form action="{{route('animal.index')}}" method="GET">
                        <select name="filter">
                            <option value="0">Visi priziuretojai</option>
                            @foreach ($managers as $managers)
                            <option value="{{$managers->id}}" @if($managers->id == $filter){{'selected'}}@endif>{{$managers->name}} {{$managers->surname}}</option>
                            @endforeach
                        </select>
                        <select name="filter">
                            <option value="0">Visi ropliai</option>
                            @foreach ($species as $species)
                            <option value="{{$species->id}}" @if($species->id == $filter){{'selected'}}@endif>{{$species->name}}</option>
                            @endforeach
                        </select>
                        <select name="sort">
                            @foreach ($sorts as $sort)
                            <option value="{{$sort->value}}" @if($sort->value == $sortDef){{'selected'}}@endif>{{$sort->text}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-success" type="submit">GERAI</button>
                        <a class="btn btn-danger" href="{{route('animal.index')}}">Isvalyti</a>
                        </form>
@foreach ($animals as $animal)
  <a href="{{route('animal.edit',[$animal])}}">
    {{$animal->name}}
</a>
     {{-- {{$animal->specie->name}}
      {{$animal->manager->name}}
       {{$animal->manager->surname}} --}}
       Atnaujinta: {{$animal->updated_at}}
  <form method="POST" action="{{route('animal.destroy', [$animal])}}">
   @csrf
   <button type="submit" class="btn btn-danger">Istrinti</button>
  </form>
  <br>
@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
