<form method="POST" action="{{route('animal.update',[$animal])}}">
    Name: <input type="text" name="animal_name" value="{{$animal->name}}">
    Birth year: <input type="text" name="animal_birth_year" value="{{$animal->birth_year}}">
    Animal book: <textarea name="animal_book">{{$animal->animal_book}}</textarea>
    <select name="specie_id">
        @foreach ($species as $specie)
            <option value="{{$specie->id}}" @if($specie->id == $animal->specie_id) selected @endif>
                {{$specie->name}}
            </option>
        @endforeach
</select>

<select name="manager_id">
    @foreach ($managers as $manager)
        <option value="{{$manager->id}}" @if($manager->id == $animal->manager_id) selected @endif>
            {{$manager->name}} {{$manager->surname}}
        </option>
    @endforeach
</select>
    @csrf
    <button type="submit">EDIT</button>
</form>