@foreach ($species as $specie)
  <a href="{{route('specie.edit',[$specie])}}">{{$specie->name}}</a>
  <form method="POST" action="{{route('specie.destroy', [$specie])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach
