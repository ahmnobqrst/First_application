@extends('layouts.app')
@section('content')
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
   <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{__('message_offer.product name')}}</th>
      <th scope="col">{{__('message_offer.product price')}}</th>
      <th scope="col">{{__('message_offer.Details')}}</th>
       <th scope="col">{{__('message_offer.photo')}}</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$offer_ajax->id}}</th>
      <td>{{$offer_ajax->OfferName}}</td>
      <td>{{$offer_ajax->price}}</td>
      <td>{{$offer_ajax->OfferDetails}}</td>
      <td><img width=100px height = 50px style="..." src="{{asset('images/offer_picture/'.$offer_ajax->photo)}}"></td>
    </tr>
    
  </tbody>
</table>
    <!--------------------------------- Start setting box ---------------------------------------->
   
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        const inpFile = document.getElementById( "inpFile" );
        const privewContainer = document.getElementById( "imagePrivew" );
        const privewImage = privewContainer.querySelector( ".imge-privew--image" );
        const privewDefaultText = privewContainer.querySelector( ".imagepreview--default-text" );
        inpFile.addEventListener( "change", function () {
            const file = this.files[ 0 ];
            if ( file ) {
                const reader = new FileReader();
                privewDefaultText.style.display = "none";
                privewImage.style.display = "block";
                reader.addEventListener( "load", function () {
                    privewImage.setAttribute( "src", this.result );
                } )

                reader.readAsDataURL( file );
            }
            else {
                privewDefaultText.style.display = "block";
                privewImage.style.display = "none";
            }
        } )
    </script>
</body>
@stop

</html>