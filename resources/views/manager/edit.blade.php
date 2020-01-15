<form method="POST" action="{{route('manager.update',[$manager])}}">
    Name: <input type="text" name="manager_name" value="{{$manager->name}}">
    Surname: <input type="text" name="manager_surname" value="{{$manager->surname}}">
    <select name="specie_id">
        @foreach ($species as $specie)
            <option value="{{$specie->id}}" @if($specie->id == $manager->specie_id) selected @endif>
                {{$specie->name}} 
            </option>
        @endforeach
</select>
    @csrf
    <button type="submit">EDIT</button>
</form>