<form method="POST" action="{{route('specie.store')}}">
    Name: <input type="text" name="specie_name">
    @csrf
    <button type="submit">ADD</button>
 </form>