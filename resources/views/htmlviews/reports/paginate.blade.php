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
        .table tr{
            border: 1px solid #ddd;
            text-align: center;
            background: #aaa;
            width: 400px;
            height: 30px;
        }
        .table{
            width: 500px;
        }
        .btn btn-success{
            border-style: solid;
            border-radius: 1px;
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
   <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{__('message.product name')}}</th>
      <th scope="col">{{__('message.product price')}}</th>
      <th scope="col">{{__('message.Description')}}</th>
      <th scope="col">{{__('message.photo')}}</th>
      <th scope="col">{{__('message.Operations')}}</th>
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
      <td><a href="{{url('offers/edit/'.$offer->id)}}" class="btn btn-success">{{__('message.edit')}}</a></td>
    </tr>
    @endforeach
    
  </tbody>


</table>
 

    
</body>

</html>