@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('api/register') }}" id="register_form">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('settings.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="surname" required class="col-md-4 col-form-label text-md-right">{{ __('settings.surname') }}</label>

                            <div class="col-md-6">
                              <input type="text" required  name="surname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('settings.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                               
                            </div>
                            <span class="invalid-feedback hide email" role="alert">
                                        <strong></strong>
                                    </span>
                        </div>

                        <div class="form-group row">
                            <label for="relative" class="col-md-4 col-form-label text-md-right">{{ __('settings.relative') }}</label>

                            <div class="col-md-6">
                                <input id="relative" type="text" class="form-control @error('relative') is-invalid @enderror" name="relative_name" value="{{ old('relative') }}" required >

                               
                            </div>
                        </div>
                  
                        <div class="form-group row">
                            <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('settings.relation') }}</label>

                            <div class="col-md-6">
                                <input id="relation" type="radio"  name="relation" value="Husband" required >
                                <span  class="col-md-4">{{ __('settings.husband') }}</span><input id="relation" type="radio"  name="relation" value="Father" required >
                                  <span  class="col-md-4">{{ __('settings.father') }}</span>
                               
                            </div> 
                        </div>
                         <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('settings.Address') }}</label>

                            <div class="col-md-6">
                             
                              <textarea required name="address" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('settings.Country') }}</label>

                            <div class="col-md-6">
                               <select class="form-control" id="country" name="country" required onchange="state_list();">
                                   <option value="">{{ __('Select Country') }}</option>
                               </select>
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('settings.State') }}</label>

                            <div class="col-md-6">
                               <select class="form-control" id="state" name="state" required onchange="city_list();">
                                   <option value="">{{ __('Select State') }}</option>
                               </select>
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('settings.District') }}</label>

                            <div class="col-md-6">
                               <select class="form-control" id="city"  name="dist" required >
                                   <option value="">{{ __('Select District') }}</option>
                               </select>
                            </div>
                        </div>
                       <div class="form-group row">
                            <label for="taluk" class="col-md-4 col-form-label text-md-right">{{ __('settings.Taluk') }}</label>

                            <div class="col-md-6">
                              <input type="text" required name="taluk" class="form-control">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="village" class="col-md-4 col-form-label text-md-right">{{ __('settings.Village') }}</label>

                            <div class="col-md-6">
                              <input type="text" required  name="village" class="form-control">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="adar" required class="col-md-4 col-form-label text-md-right">{{ __('settings.Adar') }}</label>

                            <div class="col-md-6">
                              <input type="number" required  name="adar" class="form-control">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="pin" required class="col-md-4 col-form-label text-md-right">{{ __('settings.Pin') }}</label>

                            <div class="col-md-6">
                              <input type="number" required  name="pin" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" required class="col-md-4 col-form-label text-md-right">{{ __('settings.Phone') }}</label>

                            <div class="col-md-6">
                              <input type="number" required  name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mob" class="col-md-4 col-form-label text-md-right">{{ __('settings.Mobile') }}</label>

                            <div class="col-md-6">
                              <input type="number" required  name="mob" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="what_mob" class="col-md-4 col-form-label text-md-right">{{ __('settings.What_mob') }}</label>

                            <div class="col-md-6">
                              <input type="number" required  name="what_mob" class="form-control">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="telg_mob" class="col-md-4 col-form-label text-md-right">{{ __('settings.Telg_mob') }}</label>

                            <div class="col-md-6">
                              <input type="number"  name="telg_mob" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('settings.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                             
                                    <span class="invalid-feedback hide password" role="alert">
                                        <strong></strong>
                                    </span>
                              
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('settings.Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-register">
                                    {{ __('settings.Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
 <script>
    $(document).ready(function(){
      $('.hide').hide();
     var option ='' ;

var settings = {
  "url": "{{url('/api/country_list')}}",
  "method": "GET",
  "timeout": 0,
  "dataType": "json",
  "processData": false,
  "contentType": false,
};

$.ajax(settings).done(function (response) {

  $.each(response.success,function(i,val){
   option += '<option value="'+val.id+'">'+val.name+'</ption>';
  });
  $("#country").append(option);
});
    })
    $('.btn-register').click(function(){
       var options = {
       beforeSubmit: function(){
        $('.hide').hide();
          $('.hide').html();
       },
       success:    function(data) {
        
        if(data){
         location.href = 'login';     
        }
       },
       error: function(data,dat,da,d){
        var err = data.responseJSON.error;
        console.log(err);
         if(err.email){
        $('.email').show();
        $('.email').html(err.email[0]);
      }
     if(err.password){
        $('.password').show();
        $('.password').html(err.password[0]);
    }
       }
   };
     $('#register_form').ajaxForm(options);
 });
     function state_list(){
        var option ='';
        var id =  $("#country").val();
        var settings = {
          "url": "{{url('/api/state_list')}}",
          "method": "POST",
          "dataType": "json",
          "data":{'country_id':id}
        };

        $.ajax(settings).done(function (response) {
          $.each(response.success,function(i,val){
           option += '<option value="'+val.id+'">'+val.name+'</ption>';
          });
          $("#state").html(option);
                });
    }
     function city_list(){
        var option ='';
        var id =  $("#state").val();
        var settings = {
          "url": "{{url('/api/city_list')}}",
          "method": "POST",
          "dataType": "json",
          "data":{'state_id':id}
        };

        $.ajax(settings).done(function (response) {
          $.each(response.success,function(i,val){
           option += '<option value="'+val.id+'">'+val.name+'</ption>';
          });
          console.log(option);
          $("#city").html(option);
                });
    }
 </script>
@endsection
