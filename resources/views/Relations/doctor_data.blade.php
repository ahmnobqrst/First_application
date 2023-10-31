@extends('layouts.app')

@section('content')
    <h1>Doctors</h1>
    
     @if(Session::has('delete'))
 <div class="alert alert-success">
     {{Session::get('delete')}}
 </div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger">
     {{Session::get('error')}}
 </div>
@endif
   <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{__('message_offer.doctor name')}}</th>
      <th scope="col">{{__('message_offer.doctor title')}}</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$doct->id}}</th>
      <th>{{$doct->name}}</th>
      <td>{{$doct->title}}</td>
    </tr>
  </tbody>
</table>
@stop
    <!--------------------------------- Start setting box ---------------------------------------->
   
   