@foreach($countries as $country)
@if($category->countries_id==$country->id)
<h1>{{$country->name}}</h1>
@endif
@endforeach