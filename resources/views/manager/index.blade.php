@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Priziuretoju sarasas</div>
                <div class="card-body">

@foreach ($managers as $manager)
<a href="{{route('manager.edit',[$manager])}}">
  {{$manager->name}}
  {{$manager->surname}} 
   {{$manager->specie->name}}</a>
  <form method="POST" action="{{route('manager.destroy', [$manager])}}">
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