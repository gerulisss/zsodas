@foreach ($animals as $animal)
  <a href="{{route('animal.edit',[$animal])}}">{{$animal->name}} {{$animal->specie->name}} {{$animal->manager->name}} {{$animal->manager->surname}}</a>
  <form method="POST" action="{{route('animal.destroy', [$animal])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach
