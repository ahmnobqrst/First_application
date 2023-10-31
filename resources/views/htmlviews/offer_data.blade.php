@extends('layouts.app')
@section('content')

<body>
    <script src="https://kit.fontawesome.com/66f45e81f9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/make-offer.css">
    <!-------------------------Start Header section---------------------------->
    
    <!-------------start make offer section ----->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
      <li class="nav-item active">
        <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }} <span class="sr-only">(current)</span></a>
      </li>
     @endforeach
  </div>
</nav>
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
      <th scope="col">{{__('message_offer.product name')}}</th>
      <th scope="col">{{__('message_offer.product price')}}</th>
      <th scope="col">{{__('message_offer.Details')}}</th>
       <th scope="col">{{__('message_offer.photo')}}</th>
      <th scope="col">{{__('message_offer.Operations')}}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($offers as $offer)
    <tr>
      <th scope="row">{{$offer->id}}</th>
      <td>{{$offer->OfferName}}</td>
      <td>{{$offer->price}}</td>
      <td>{{$offer->OfferDetails}}</td>
      <td><img width=100px height = 50px style="..." src="{{asset('images/offer_picture/'.$offer->photo)}}"></td>
      <td><a href="{{url('offers/editoffer/'.$offer->id)}}" class="btn btn-success">{{__('message_offer.edit')}}</a></td>
      <td><a href="{{url('offers/update/'.$offer->id)}}" class="btn btn-success">{{__('message_offer.update')}}</a></td>
      <td><a href="{{route('delete',$offer->id)}}" class="btn btn-danger">{{__('message_offer.delete')}}</a></td>
    </tr>
    @endforeach
    
  </tbody>
</table>
    <!--------------------------------- Start setting box ---------------------------------------->
   
   
</body>

@stop


</html>