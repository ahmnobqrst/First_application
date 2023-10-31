@extends('layouts.app')
@section('content')
 <h1>Hospitals</h1>
   <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{__('message_offer.hospital name')}}</th>
      <th scope="col">{{__('message_offer.hospital address')}}</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($hospitals) && $hospitals->count() >0)
    @foreach($hospitals as $hospital)
    <tr>
      <th scope="row">{{$hospital->id}}</th>
      <th>{{$hospital->name}}</th>
      <td>{{$hospital->address}}</td>
      <td><a href="{{route('getdoctor',$hospital->id)}}">{{__('message_offer.show')}}</a></td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
@stop
    <!--------------------------------- Start setting box ---------------------------------------->
   
   