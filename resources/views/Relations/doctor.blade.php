@extends('layouts.app')
    <!-------------start make offer section ----->
@section('content')
    <h1>Doctors</h1>
   <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{__('message_offer.doctor name')}}</th>
      <th scope="col">{{__('message_offer.doctor title')}}</th>
      <th scope="col">{{__('message_offer.options')}}</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($doctors) && $doctors->count() >0)
    @foreach($doctors as $doctor)
    <tr>
      <th scope="row">{{$doctor->id}}</th>
      <th>{{$doctor->name}}</th>
      <td>{{$doctor->title}}</td>
       <td><a href="{{route('edit',$doctor->id)}}" class="alert alert-success">edit</a></td>
       <td><a href="{{route('delete_doctor',$doctor->id)}}" class="alert alert-danger">Delete</a></td>
       <td><a href="{{route('get_service',$doctor->id)}}" class="alert alert-success">Services</a></td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
@stop

    <!--------------------------------- Start setting box ---------------------------------------->
   
   

