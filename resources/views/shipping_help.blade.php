
@extends('layouts.app')

@section('title', 'Shipping Help | ')

@section('content')
<style>
    .adp_img{
        width: 100% !important;
    }
    .send-btn button{
        background-color: #cc8a19; color: #fff; border:1px solid #cc8a19;
    }
    .send-btn button:hover{
        background-color: #eeb450; color: #fff; border:1px solid #cc8a19;
    }
    .form-group label{
        text-align: left !important;
        font-weight: 600 !important;
    }
</style>

    <div class="main">
        <div class="sub-banner" style="background-image:url({{asset('OurBackend/img/makeupartist.jfif')}})">
            <div class="container">
                <div class="page-name">
                    <div class="sub-banner-text-content">
                        <h1>Help</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><span>/</span>How to ship with us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="pricing-tables-3 content-area advertise-with-us-page">
            <div class="container" style="background-color: #fff; padding-top: 30px">
                <div class="text-center">
                    <p class="text-center">
                        Experience rapid boost in exposure of your business and services by placing Banner adverts on <br>
                        EFContact platform.
                    </p>
                    <h2>WHY EFContact?</h2>
                    <em><strong>"Your brand deserves the right audience"</strong></em>
                    <p>
                        With over half a million dedicated monthly visitors and 5-7 million monthly page-views,<br>
                        your business, product &amp; services are placed right in front of dedicated audience of<br>
                        EFContact platform.
                    </p>
                    <div>
                        <h2>BANNER AD SIZES</h2>
                        <a class="btn btn-warning btn-lg" style="color: #fff" href="{{ route('download.ad.brochure') }}">Download Banner Brochure</a>
                    </div>
                </div>

                <hr>
                

                <div class="row">
                    <div class="col-md-12">
                        <div class="submit-address advertise-with-us-page-form">
                            <form method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="POST">

                                <div class="text-center">
                                    <h3 class="heading-2">Contact Us:</h3>
                                    <strong><a href="mailto:{{ $general_info->contact_email ? $general_info->contact_email : '' }} ">
                                        {{ $general_info->contact_email ? $general_info->contact_email : '' }}
                                    </a></strong>
                                    <a href="tel:{{ $general_info->hot_line ? $general_info->hot_line : '' }} ">
                                        {{ $general_info->hot_line ? '+234 '.$general_info->hot_line : '' }}
                                    </a>,
                                    <a href="https://wa.me/{{ $general_info->hot_line_3 ? $general_info->hot_line_3 : '' }}/?text=Good%20day.%20I%20am%20interested%20in%20advertising%20my%20business%20and%20services." target="_blank">
                                        <i class="fa fa-whatsapp" style="font-size: 15px"></i> WhatsApp
                                    </a><br>
                                    <p><strong>Or fill the form below</strong></p>
                                </div>

                                <div class="search-contents-sidebar mb-30">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group name">
                                                        <label for="name">Full Name</label><small class="text-danger">*</small>
                                                        <input id="name" name="name" class="form-control"  required type="text" placeholder="Enter Full Name" style="color: black;" value="{{ old('name') }}">
                                                        @if ($errors->has('name'))
                                                            <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group email">
                                                        <label for="email">Your Email</label><small class="text-danger">*</small>
                                                        <input id="email" name="email" class="form-control required email" required type="email" placeholder="Email" style="color: black;" value="{{ old('email') }}">
                                                        @if ($errors->has('email'))
                                                            <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group subject">
                                                        <label for="subject">Subject</label><small class="text-danger">*</small>
                                                        <input type="text" name="subject" id="subject" required class="form-control" placeholder="Please enter your message subject" style="color: black;" value="{{ old('subject') }}">
                                                        @if ($errors->has('subject'))
                                                            <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                            <strong class="text-danger">{{ $errors->first('subject') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group number">
                                                        <label for="phone">Phone Number</label><small class="text-danger">*</small>
                                                        <input id="phone" name="phone" required class="form-control" type="number" placeholder="Enter your phone number" style="color: black;" value="{{ old('phone') }}">
                                                        @if ($errors->has('phone'))
                                                            <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12" style="" class="text-center">
                                                    <div class="form-group">
                                                        <label for="advert_type">Advertisement Type</label><small class="text-danger">*</small>
                                                        <select class="form-control text-center" id="advert_type" name="advert_type" value="{{ old('advert_type') }}" required>
                                                            <option class="text-center" value="" selected disabled>-- Select Advert Type --</option>
                                                            @if ($advertlocations)
                                                                @foreach ($advertlocations as $advertlocation)
                                                                    <option class="text-center" value="{{ $advertlocation->title }}">{{ $advertlocation->title }}</option>
                                                                @endforeach

                                                            @else
                                                                <p>No location</p>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12" style="" class="text-center">
                                                    <div class="form-group">
                                                        <label for="advert_referral_name">Were you referred by someone (Optional)?</label>
                                                        <input type="text" name="advert_referral_name" id="advert_referral_name" class="form-control" placeholder="Enter the person full name." style="color: black;" value="{{ old('advert_referral_name') }}">
                                                        @if ($errors->has('advert_referral_name'))
                                                            <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                            <strong class="text-danger">{{ $errors->first('advert_referral_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group message">
                                                        <label for="message">The Message</label><small class="text-danger">*</small>
                                                        <textarea class="form-control" required name="message" id="message" placeholder="Write message" style="color: black;"></textarea>
                                                        @if ($errors->has('message'))
                                                            <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                <strong class="text-danger">{{ $errors->first('message') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="send-btn text-center">
                                                        <button type="submit" id="sendMessage" class="btn btn-lg">Send Message</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#sendMessage").click(function(e){
                e.preventDefault();

                $("#sendMessage").text('Please wait, sending!!!')
                $("#sendMessage").css({"opacity": "0.5", "cursor":"default"});

                var _token = $("input[name='_token']").val();
                var name = $("#name").val();
                var email = $("#email").val();
                var advert_type = $("#advert_type").val();
                var phone = $("#phone").val();
                var subject = $("#subject").val();
                var message = $("#message").val();
                var advert_referral_name = $("#advert_referral_name").val();

                $.ajax({
                    url: '/store_advert_request_form',
                    method:'POST',
                    data: {_token:_token, name, email, advert_type, phone, subject, message, advert_referral_name },
                    success: function(data) {
                        $("#name").val('')
                        $("#phone").val('')
                        $("#email").val('')
                        $("#advert_type").val('')
                        $("#subject").val('')
                        $("#message").val('')
                        $("#advert_referral_name").val('')
                        $("#sendMessage").css({"opacity": "1", "cursor":"pointer"});
                        $("#sendMessage").text('Send another message')

                        toastr.success('Message sent successfully!')
                    },
                    error: function(error){
                        toastr.error('Message not sent! Try again. Make sure all fields are filled.')

                        $("#sendMessage").css({"opacity": "1", "cursor":"pointer"});
                        $("#sendMessage").text('Send message')
                    }
                });
            });
        })
    </script>
@endsection
