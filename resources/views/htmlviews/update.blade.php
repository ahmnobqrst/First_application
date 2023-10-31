<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Offer</title>
    <style>
        .image-privew {
            width: 300px;
            min-height: 100px;
            border: 2px solid #dddddd;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #ccc;
        }

        .imge-privew--image {
            display: none;
            width: 100%;
        }
        .form input{
            border: 1px solid #ccc;
        }
    </style>
</head>

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
                    <h3>{{__('message.update data of product')}}</h3>
                   
                </div>
                @if(Session::has('stored'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('stored')}}
                </div>
                @endif
                <div class="offer-form col-6">
                    <form method ="POST" action="{{route('offer.update',$offer->id)}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">{{__('message.product name arabic')}} </label>
                                <input type="text" class="form-control" name = "name_ar" value ="{{$offer->name_ar}}" id="inputEmail4" placeholder="{{__('message.product name arabic')}}">
                                @error('name_ar')
                               <small class="form-text text-danger">{{$message}}</small>
                               @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">{{__('message.product name english')}} </label>
                                <input type="text" class="form-control" name = "name_en" value ="{{$offer->name_en}}" id="inputEmail4" placeholder="{{__('message.product name english')}}">
                                @error('name_en')
                               <small class="form-text text-danger">{{$message}}</small>
                               @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">{{__('message.product price')}}</label>
                                <input type="text" class="form-control" name ="p_price" value ="{{$offer->p_price}}" id="inputPassword4" placeholder="{{__('message.product price')}}">
                                @error('p_price')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">{{__('message.Description arabic')}}</label>
                            <input type="" name="" class="form-control" name="desc_ar" value="{{$offer->desc_ar}}" placeholder="{{__('message.Description arabic')}}"></input>
                            @error('desc_ar')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">{{__('message.Description english')}}</label>
                            <input class="form-control" name="desc_en" value="{{$offer->desc_en}}" placeholder="{{__('message.Description english')}}"></input>
                            @error('desc_en')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary  btn-block">{{__('message.update')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

</html>