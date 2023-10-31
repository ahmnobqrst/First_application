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
    <div class="add-offer">

        <div class="container">
            <div class="row">
                <div class="offer-desc col-6">
                    <h3>{{__('message.Add your Amazing product')}}</h3>
                   
                </div>
                @if(Session::has('stored'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('stored')}}
                </div>
                @endif
                <div class="offer-form col-6">
                    <form method ="post" action="{{route('addation')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">{{__('message.product name arabic')}} </label>
                                <input type="text" class="form-control" name = "name_ar" id="inputEmail4" placeholder="{{__('message.product name arabic')}}">
                                @error('name_ar')
                               <small class="form-text text-danger">{{$message}}</small>
                               @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">{{__('message.product name english')}} </label>
                                <input type="text" class="form-control" name = "name_en" id="inputEmail4" placeholder="{{__('message.product name english')}}">
                                @error('name_en')
                               <small class="form-text text-danger">{{$message}}</small>
                               @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">{{__('message.product price')}}</label>
                                <input type="text" class="form-control" name ="p_price" id="inputPassword4" placeholder="{{__('message.product price')}}">
                                @error('p_price')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">{{__('message.Description arabic')}}</label>
                            <textarea class="form-control" name="desc_ar" placeholder="{{__('message.Description arabic')}}"></textarea>
                            @error('desc_ar')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">{{__('message.Description english')}}</label>
                            <textarea class="form-control" name="desc_en" placeholder="{{__('message.Description english')}}"></textarea>
                            @error('desc_en')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary  btn-block">{{__('message.make offer')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------- Start setting box ---------------------------------------->
   
    
</body>
@stop

</html>