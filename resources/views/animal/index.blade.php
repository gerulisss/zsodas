@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvunu sarasas</div>
                <div class="card-body">
@foreach ($animals as $animal)
  <a href="{{route('animal.edit',[$animal])}}">
    {{$animal->name}}
     {{$animal->specie->name}}
      {{$animal->manager->name}}
       {{$animal->manager->surname}}</a>
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
