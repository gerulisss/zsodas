<form method="POST" action="{{route('specie.update',[$specie])}}">
    Name: <input type="text" name="specie_name" value="{{$specie->name}}">
    @csrf
    <button type="submit">EDIT</button>
 </form>