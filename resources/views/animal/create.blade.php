@extends('layouts.app')
@section('messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gyvūno sukūrimas</div>
                <div class="card-body">
<form method="POST" action="{{route('animal.store')}}">
    Name: <input type="text" name="animal_name" class="form-control">
    Birth year: <input type="text" name="animal_birth_year" value="{{old('animal_birth_year')}}" class="form-control">
    Animal book: <textarea name="animal_book" class="form-control" id="summernote"></textarea>
    Select specie: <select name="specie_id" class="selectpicker form-control">
        @foreach ($species as $specie)
            <option value="{{$specie->id}}">{{$specie->name}}</option>
        @endforeach
 </select>
 Select manager: <select name="manager_id" class="selectpicker form-control">
    @foreach ($managers as $manager)
        <option value="{{$manager->id}}">{{$manager->name}} {{$manager->surname}}</option>
    @endforeach
</select>
<br>
    @csrf
    <button type="submit" class="btn btn-primary btn-sm">Sukurti</button>
    <a class="btn btn-success btn-sm" href="{{route('animal.index')}}">Grįžti į gyvūnų sąrašą</a>
 </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // $(document).ready(function() {
    // $('#summernote').summernote();
    // });
    $("#summernote").summernote({
    height: 200,
    toolbar: [
        [ 'style', [ 'style' ] ],
        [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
        [ 'fontname', [ 'fontname' ] ],
        [ 'fontsize', [ 'fontsize' ] ],
        [ 'color', [ 'color' ] ],
        [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
        [ 'table', [ 'table' ] ],
        [ 'insert', [ 'link'] ],
        [ 'view', [ 'undo', 'redo', 'fullscreen', 'help' ] ]
    ]
});
    </script>
@endsection