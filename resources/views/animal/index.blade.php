@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvunai</div>
                <div class="card-body">
                    @if(session()->has('success_message'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success_message')}}
            </div>
        @endif
@foreach ($animals as $animal)
  <a href="{{route('animal.edit',[$animal])}}">
    {{$animal->name}}
     {{$animal->specie->name}}
      {{$animal->manager->name}}
       {{$animal->manager->surname}}</a>
  <form method="POST" action="{{route('animal.destroy', [$animal])}}">
   @csrf
   <button type="submit">Istrinti</button>
  </form>
  <br>
@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
