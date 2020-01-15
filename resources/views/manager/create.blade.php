<form method="POST" action="{{route('manager.store')}}">
    Name: <input type="text" name="manager_name">
    Surname: <input type="text" name="manager_surname">
    <select name="specie_id">
        @foreach ($species as $specie)
            <option value="{{$specie->id}}">{{$specie->name}}</option>
        @endforeach
 </select>
    @csrf
    <button type="submit">ADD</button>
 </form>