@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvunu rusiu sarasas</div>
                <div class="card-body">
                @foreach ($species as $specie)
             Rusis: <a href="{{route('specie.edit',[$specie])}}">{{$specie->name}}</a>
              <form method="POST" action="{{route('specie.destroy', [$specie])}}">
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