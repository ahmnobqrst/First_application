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

<div class="alert alert-success" id="success_ajax" style="display: none;">
  
  {{__('message_offer.ajax_success_delete')}}

</div>



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
    @if(isset($offers) && $offers->count() > 0)
    @foreach($offers as $offer)
    <tr class="Rowajax{{$offer->id}}">
      <th scope="row">{{$offer->id}}</th>
      <td>{{$offer->OfferName}}</td>
      <td>{{$offer->price}}</td>
      <td>{{$offer->OfferDetails}}</td>
      <td><img width=100px height = 50px style="..." src="{{asset('images/offer_picture/'.$offer->photo)}}"></td>
      <td><a href="{{route('edit_ajax',$offer->id)}}" class="btn btn-success">{{__('message_offer.edit')}}</a></td>
      <td><a href="{{route('update_with_ajax',$offer->id)}}" class="btn btn-success">{{__('message_offer.update')}}</a></td>
      <td><a href="" offer_id ="{{$offer->id}}" class="delete_ajax btn btn-danger">{{__('message_offer.delete')}}</a></td>
    </tr>
    @endforeach
    @endif
    
  </tbody>
</table>
    <!--------------------------------- Start setting box ---------------------------------------->
   
   
</body>

@stop


@section('scripts')

 <script>

    $(document).on('click','.delete_ajax',function(e){

    e.preventDefault();

     var offer_id = $(this).attr('offer_id');

     $.ajax({
               type:'post',
               url:"{{route('delete_ajax_first')}}",
               data:{

                 '_token':"{{csrf_token()}}",
                 'id':offer_id

               },
               
               success:function(data) {
                 if(data.status == true)
                 {

                    //alert(data.msg); // may be make it div not alert

                     $('#success_ajax').show();
                 }

                 $('.Rowajax'+data.id).remove();
                    
               }, error: function (data) {


               },
            });


    })
     
   
 </script>


 @stop


</html>