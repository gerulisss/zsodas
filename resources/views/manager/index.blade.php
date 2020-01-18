@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prižiurėtojų sąrašas
                    <a class="btn btn-primary btn-sm" href="{{route('manager.create')}}">Sukurti nauja</a>
                </div>
                <div class="card-body">
                    <form action="{{route('manager.index')}}" method="GET">
                        <select name="filter">
                            <option value="0">Visos rūšys</option>
                            @foreach ($species as $species)
                            <option value="{{$species->id}}" @if($species->id == $filter){{'selected'}}@endif>{{$species->name}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-success btn-sm" type="submit">Rušiuoti</button>
                        <a class="btn btn-danger btn-sm" href="{{route('manager.index')}}">Išvalyti</a>
                        </form>
                        <br>
@foreach ($managers as $manager)
{{-- <a href="{{route('manager.edit',[$manager])}}">
  {{$manager->name}}
  {{$manager->surname}} 
  priziuri rusi: {{$manager->specie->name}}</a> --}}
  <form method="POST" action="{{route('manager.destroy', [$manager])}}">
   @csrf
   {{$manager->name}}
{{$manager->surname}} 
<a style="text-decoration:none;" href="{{route('manager.edit',[$manager])}}"><button type="button" class="btn btn-primary btn-sm">Redaguoti</button></a>
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