@foreach ($managers as $manager)
<a href="{{route('manager.edit',[$manager])}}">{{$manager->name}}{{$manager->surname}}  {{$manager->managerSpecie->name}}</a>
  <form method="POST" action="{{route('manager.destroy', [$manager])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach