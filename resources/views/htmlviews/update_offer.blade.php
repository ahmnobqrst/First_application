<!DOCTYPE html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>update page </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&family=Montserrat+Alternates&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Piedra&family=Titillium+Web:wght@300&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css  ">
    <link rel="stylesheet" type="text/css" href="css/animate.css  ">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .form-group input{
                width: 300px;
                border: 1px solid #ccc;
                padding: 10px;
                margin: 10px;
                color: red;
                background-color: #ccc;
            }
            .form-group button{
                width: 80px;
                border: 1px solid #ccc;
                padding: 10px;
                margin: 10px;
                color: blue;
                background-color: #aaa;
            }
            .alert alert-success{
                width: 300px;
                padding: 10px;
                margin: 10px;
                border: 1px solid #ccc;  
            }
            .form-text text-danger{
                color: red;
                padding: 10px;
                margin: 10px;
            }
            .title m-b-md{
                color: red;
                padding: 10px;
                margin: 10px;
                width: 300px;
            }
        </style>
    </head>
    <body>
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
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    {{__('message_offer.upadte offer')}}
                </div>
                @if(Session::has('stored'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('stored')}}
                </div>
                @endif
                <div class="login-form  col-offset-2 col-12 col-lg-4 text-center col-sm-12 col-md-12">
                    <form method ="post" action="{{route('updated',$up_offer->id)}}">
                        @csrf
                        <h5>{{__('message_offer.update data')}}</h5>
                        <div class="form-group">
                            <input type="text" class="form-control" name ='name_ar' value="{{$up_offer->name_ar}}" placeholder="{{__('message_offer.Enter offer arabic name')}}">
                            @error('name_ar')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name ='name_en' value="{{$up_offer->name_en}}" placeholder="{{__('message_offer.Enter offer english name')}}">
                            @error('name_en')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name ='photo' value="{{asset('images/offer_picture/'.$up_offer->photo)}}">
                            @error('photo')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="price" value="{{$up_offer->price}}" placeholder="{{__('message_offer.offer price')}}">
                            @error('price')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="details_ar" value="{{$up_offer->details_ar}}" placeholder="{{__('message_offer.details in arabic')}}">
                            @error('details_ar')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="details_en" value="{{$up_offer->details_en}}" placeholder="{{__('message_offer.details in english')}}">
                            @error('details_en')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button>{{__('message_offer.updated')}}</button> 
                        </div>
                    </form>
                </div>

                

            </div>
        </div>
    </body>
</html>
