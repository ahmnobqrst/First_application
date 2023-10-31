@extends('layouts.app')
@section('content')
 <h1>Services</h1>
   <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Service name</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($Services) && $Services->count() >0)
    @foreach($Services as $Service)
    <tr>
      <th scope="row">{{$Service->id}}</th>
      <th>{{$Service->name}}</th>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
<br><br>
<br><br>
<br><br>
              <div class="login-form  col-offset-2 col-12 col-lg-4 text-center col-sm-12 col-md-12">
                    <form method ="post" action="{{route('save_service')}}"  >
                        @csrf
                        <div>
                           <label>اختر الطبيب</label >
                            <Select class="form-control" name="doctors_id">
                              @if(isset($doctors) && $doctors -> count() >0)
                               @foreach($doctors as $doctor)
                                  <option value="{{$doctor -> id}}">{{$doctor -> name}}</option>
                                @endforeach
                              @endif
                            </Select>
                            
                        </div>
                        <div class="form-group">
                           <label>اختر التخصص</label >
                            <Select class="form-control" name="Services_id[]" multiple>
                              @if(isset($service) && $service -> count() >0)
                               @foreach($service as $services)
                                  <option value="{{$services -> id}}">{{$services -> name}}</option>
                                @endforeach
                              @endif
                            </Select>
                           
                        </div>
                        <div class="form-group">
                            <button>{{__('message_offer.submit')}}</button> 
                        </div>
                    </form>
                </div>
@stop
    <!--------------------------------- Start setting box ---------------------------------------->


   
   