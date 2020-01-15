<form method="POST" action="{{route('animal.store')}}">
    Name: <input type="text" name="animal_name">
    Birth year: <input type="text" name="animal_birth_year">
    Animal book: <textarea name="animal_book"></textarea>
    <select name="specie_id">
        @foreach ($species as $specie)
            <option value="{{$specie->id}}">{{$specie->name}}</option>
        @endforeach
 </select>
 <select name="manager_id">
    @foreach ($managers as $manager)
        <option value="{{$manager->id}}">{{$manager->name}} {{$manager->surname}}</option>
    @endforeach
</select>
    @csrf
    <button type="submit">ADD</button>
 </form>