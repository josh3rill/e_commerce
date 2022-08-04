
@extends('layouts.app')
@section('title', 'Register')

@section('content')

<style>
    .input-group input{
        padding: 10px 20px;
        font-size: 15px;
        outline: none;
        height: 50px;
        font-weight: 500;
        border: 1px solid transparent;
        background: #fff;
        box-shadow: 0 0 5px rgb(0 0 0 / 20%);
        border-top-left-radius: 50px;
        border-bottom-left-radius: 50px;
    }
    .input-group .input-group-text{
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        box-shadow: 5px 0 5px rgb(0 0 0 / 10%);
        border: 1px solid transparent;
        background: #fff;
        outline: none;
        z-index: 1;
    }
</style>

    <div class="contact-section">
        <div class="container">
            <div class="row login-box">
                <div class="col-lg-6 align-self-center pad-0">
                    <div class="form-section clearfix">
                        <h3>Create an account</h3>
                        <div class="btn-section clearfix">
                            <a href="{{route('login')}}" class="link-btn active btn-1 default-bg">Login</a>
                            <a href="{{route('register')}}" class="link-btn btn-1 active-bg">Register</a>
                            <a data-toggle="modal" data-target="#launchAgentModal" href="#" class="link-btn btn-2 default-bg">Agent</a>

                        </div>

                        <div class="clearfix"></div>
                        {{-- form with gtpay
                        <form method="POST" action="{{ route('register') }}"> --}}

                            {{-- Next line is for registration without payment --}}
                        {{-- <form method="POST" action="{{ route('createUser2') }}"> --}}

                            {{-- form for paystack pay --}}
                            {{-- <form method="POST" action="{{ route('register') }}"> --}}

                                {{-- Next line is for registration without payment --}}
                            {{-- <form method="POST" action="{{ route('createUser2') }}"> --}}
                                @csrf
                                <div class="form-group form-box">
                                    <input id="name" type="text" class="input-text" name="name" value="{{ old('name') }}" autofocus placeholder="Full Name" required>
                                    @if ($errors->has('name'))
                                        <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group form-box" style="margin-bottom: 0">
                                    <input id="email" type="email" placeholder="Email Address" class="input-text" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group form-box">
                                    <input type="hidden" class="input-text" name="refer" value="{{$referParam}}">
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="password" name="password" id="passwordField" class="form-control" placeholder="Password (min: 6 chars)" aria-label="Password" aria-describedby="Password">
                                        <div class="input-group-append" id="showpasswordtoggle" name="showpasswordtoggle" onclick="showPassword()">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-eye"></i></span>
                                        </div>
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group form-box clearfix">
                                    <input class="input-text" placeholder="Confirm Password" type="password" name="password_confirmation" required>
                                </div>

                                <p>
                                    <h6>What do you want to do?</h6>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="role" required>
                                                <option selected> Choose... </option>
                                                <option value="seller"> Provide a service </option>
                                                <option value="buyer"> I'm looking for a service </option>
                                            </select>
                                        </div>
                                    </div>
                                </p>
                                <p>
                                    @if(!$referParam)
                                <div class="form-group form-box">
                                <h6 class="text-center">Where you referred by our agent?</h6>
                                    <input id="agent_code" type="text" placeholder="Enter Agent Code (Optional)" class="input-text" name="agent_code" value="{{ old('agent_code') }}">
                                    @if ($errors->has('agent_code'))
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong class="text-danger">{{ $errors->first('agent_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                @endif
                                </p>
                                <p>
                                    <label>
                                        <input type="checkbox" name="terms" class="filled-in" required/>
                                        <span>By registering you accept our <a href="{{route('terms-of-use')}}" target="_blank" style="color: blue">Terms of Use</a> and <a href="{{route('privacy-policy')}}" target="_blank" style="color: blue"> Privacy</a> and agree that we and our selected partners may contact you with relevant offers and services.</span>
                                    </label>
                                </p>
                                <div class="form-group clearfix mb-0">
                                    <button type="submit" class="btn-md float-left" style="background-color: #cc8a19; color: #fff">Create Account</button>
                                </div>
                            </form>
                          <!-- @livewire('user.register', ['referParam' => $referParam]) -->
                    </div>
                </div>

                <div class="col-lg-6 bg-color-15 align-self-center pad-0 p-3">
                    @if(isset($general_info->register_section_1_title))
                        <h6 class="text-center"> {{ $general_info->register_section_1_title ? $general_info->register_section_1_title : '' }} </h6>
                        <hr>
                        <p>
                            {!! $general_info->register_section_1 ? $general_info->register_section_1 : '' !!}
                        </p>
                    @endif
                    <!--h6 class="text-center">What I gain by joining Estate.ng</h6-->
                    <hr>
                    @if(isset($general_info->register_section_1_title))
                        <h6 class="text-center"> {{ $general_info->register_section_2_title ? $general_info->register_section_2_title : '' }} </h6>
                        <hr>
                        <p>
                            {!! $general_info->register_section_2 ? $general_info->register_section_2 : '' !!}
                        </p>
                    @endif

                    <hr>
                    @if(isset($general_info->register_section_2_title))
                        <h6 class="text-center"> {{ $general_info->register_section_3_title ? $general_info->register_section_3_title : '' }} </h6>
                        <hr>
                        <p>
                            {!! $general_info->register_section_3 ? $general_info->register_section_3 : '' !!}
                        </p>
                    @endif
                    {{-- <hr>
                    <div class="info clearfix">
                        <div class="logo-2">
                            <a href="{{url('/')}}">
                                <img src="logos/Logo.png" class="cm-logo" alt="black-logo">
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $('.refresh').click(function(){
            $.ajax({
                type:'GET',
                url:'refreshcaptcha',
                success:function(data){
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>

<script>
    function showPassword() {
        var passField = document.getElementById("passwordField");
        if (passField.type === "password") {
            passField.type = "text";
        } else {
            passField.type = "password";
        }
    }
</script>

{{-- reg with paystack --}}
<script>
    base_Url = "{{url('/')}}"


   function regWithPaystack1(){

   var _token = $("input[name='_token']").val();

   var name = $("#name").val();
   var email = document.getElementById('email').value //$("#email").val();
   var password = $("#password").val();
   var refer = $("#refer").val();
   var role = $("#role").val();
   var agent_code = $("#agent_code").val();
    // console.log(new_id);
        console.log(email);




    var handler = PaystackPop.setup({
      key: 'pk_test_cb0fc910bb9fd127519794aa4128be0fd2c354d4',
      email: email,
      amount: 2000000,
        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

        metadata: {
         custom_fields: [
         {
          display_name: "Mobile Number",
          variable_name: "mobile_number",
          value: "+2348012345678"
        }
        ]
      },
      callback: function(response){
        var ref_no1 = response.reference;
    });*/
    $.ajax({
      type:'POST',
                      url: "{{ route('createpaypaystack2') }}",
                      // url: base_Url + '/provider/service/createpay/',
                      data: {_token:_token, email:email, password:password, refer:refer, role:role, agent_code:agent_code},
                      success: function(data) {
                        alert(data);
                        console.log(data);
                      }
                    });
         //   alert('success. transaction ref is ' + response.reference);
       },
       onClose: function(){
        alert('window closed');
      }
    });
    handler.openIframe();
  }
  </script>


@endsection
