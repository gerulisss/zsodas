@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvunu rusys</div>
                <div class="card-body">
                @if(session()->has('success_message'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('success_message')}}
                </div>
            @endif
                @foreach ($species as $specie)
              <a href="{{route('specie.edit',[$specie])}}">{{$specie->name}}</a>
              <form method="POST" action="{{route('specie.destroy', [$specie])}}">
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