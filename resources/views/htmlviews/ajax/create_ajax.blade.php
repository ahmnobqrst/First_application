@extends('layouts.app')
@section('content')
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

            <div class="alert alert-success" id="success_ajax" style="display: none;"> // to show data
                {{__('message_offer.ajax_success')}}
            </div>

            <div class="content">
                <div class="title m-b-md">
                    {{__('message_offer.add offer with form')}}
                </div>
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
                @endif
                <div class="login-form  col-offset-2 col-12 col-lg-4 text-center col-sm-12 col-md-12">
                    <form method ="post" action=""id="offerform" enctype="multipart/form-data">
                        @csrf
                        <h5>{{__('message_offer.offer details')}}</h5>
                        <div class="form-group">
                            <input type="text" class="form-control" name ='name_ar'placeholder="{{__('message_offer.Enter offer arabic name')}}">

                            <small id="name_ar_error" class="form-text text-danger"></small>
                          
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name ='name_en' placeholder="{{__('message_offer.Enter offer english name')}}">
                          
                            <small id ="name_en_error" class="form-text text-danger"></small>
                           
                        </div>
                        <div class="form-group" >
                            <input type="file" class="form-control" name ='photo'>
                            
                            <small id ="photo_error" class="form-text text-danger"></small>
                          
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="price" placeholder="{{__('message_offer.offer price')}}">
                           
                            <small id ="price_error" class="form-text text-danger"></small>
                            
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="details_ar" placeholder="{{__('message_offer.details in arabic')}}">
                          
                            <small id ="details_ar_error" class="form-text text-danger"></small>
                         
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="details_en" placeholder="{{__('message_offer.details in english')}}">
                           
                            <small id ="details_en_error" class="form-text text-danger"></small>
                          
                        </div>
                        <div class="form-group">
                            <button id ="save_ajax" >{{__('message_offer.submit')}}</button> 
                        </div>
                    </form>
                </div>

                

            </div>
        </div>

        @stop

@section('scripts')

 <script>

    $(document).on('click','#save_ajax',function(e){

    e.preventDefault();

    /*
    this mean that reset all error after click on buton

    */

    $('#name_ar_error').text('');
    $('#name_en_error').text('');
    $('#photo_error').text('');
    $('#details_ar_error').text('');
    $('#details_en_error').text('');
    $('#price_error').text('');
    var formData = new FormData($("#offerform")[0]);

     $.ajax({
               type:'post',
               url:"{{route('store_ajax_first')}}",
               enctype:"multipart/form-data",
               data:/*{

               '_token':"{{csrf_token()}}",
               'name_ar': $("input[name = 'name_ar']").val(),//$("#name_ar").val(),
               'name_en':$("input[name = 'name_en']").val(),
               //'photo':$("#photo").val(),
               'price':$("input[name='price']").val(),
               'details_ar':$("input[name = 'details_ar']").val(),
               'details_en':$("input[name = 'details_en']").val(),
               

               }*/formData,
               contentType: false,
               processData: false,
               success:function(data) {
                 if(data.status == true)
                 {

                    //alert(data.msg); // may be make it div not alert

                     $('#success_ajax').show();
                 }
                    
               }, error: function (reject) {
                 
                 var response = $.parseJSON(reject.responseText);
                 $.each(response.errors,function(key,val){
                    $('#'+key+'_error').text(val[0]); 


                  /*
                    
                    this function mean that i get text for error validate under element 

                    [reject.responseText] =>>>> mean that in case false get wrong in text 
                    [val[0]] ===>>>>>>> this mean that text of wrong back in array of one index like ['photo of offer is required']
                    this array contain one index of element
                    [$('#')] ===>>>>>>>>> this mean select id of error 
                    [.text] ==>>>>>>>> this mean text between <small></small>

                  */
                 })

               },
            });


    })
     
   
 </script>


 @stop
    
    
</html>
