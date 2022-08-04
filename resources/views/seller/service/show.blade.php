
@extends('layouts.seller')

@section('title', 'Upload Images | ')

@section('content')

<style>
    .box-heading{
        font-weight: 600; font-size: 15px; margin: 0 0 10px 0; padding: 0
    }
    .box-heading span{
        font-weight: normal;
    }
    /* .images{
        width: 100%;
        display: flex;
        justify-content: space-evenly
    }
    .image-list img{
        width: 50px
    } */

</style>


<div class="content-wrapper" style="min-height: 868px;">

    @include('layouts.backend_partials.status')


    <section class="content-header">
        <h3 class="page-title">Upload Image(s)</h3>
        <p class="page-description">Upload multiple images to describe your service better.</p>
    </section>


  <section class="content">
    <div class="row">
        <div class="col-md-5">
            <div class="box box-default">
                <div class="box-header">
                    {{-- <div>
                        <img src="{{ $service->thumbnail ? asset('uploads/services/'.$service->thumbnail) : asset('images/00_SEO-and-Digital-Marketing-Agency-Mega-Stationery-Branding-Identity-Design-Template-scaled.jpg') }}" style="width: 70%; height: auto; margin: 0 auto">
                    </div> --}}
                    <h2 class="box-title" style="font-weight: 700">Your New Service</h2>
                    <p>This is your newly created service.</p>
                </div>
                <div class="box-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="right"><strong>Service Name: </strong> {{ $service->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="right"><strong>Posted: </strong> {{ $service->created_at->diffForHumans() }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="right"><strong>Description: </strong> {!! $service->description !!}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="right"><strong>Category: </strong> {{ $service->category->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="right"><strong>Amount Charge: </strong> {{ $service->min_price }}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Country : </strong>
                            <span class="right">Nigeria</span>
                        </li>
                        <li class="list-group-item">
                            <strong>State : </strong>
                            <span class="right"> {{ $service->state }} </span>
                        </li>
                        <li class="list-group-item">
                            <strong>City : </strong>
                            <span class="right"> {{ $service->city }}</span>
                        </li>

                        <li class="list-group-item">
                            <strong>Address : </strong>
                            <span class="left"> {{ $service->address }}</span>
                        </li>

                        @if ($service->is_featured == 1 && $service->paid_featured == 0)
                            <li class="list-group-item">
                                <span class="left">Please make payment now to be featured!</span>
                                <p><strong>Note:</strong> This service won't be featured without payment.</p>
                                <form>
                                    @csrf
                                    <input id="user_email" type="hidden" name="" value="{{Auth::user()->email}}">
                                    <input id="featured_amount" type="hidden" name="amount" value="1000">
                                    <input id="service_id" type="hidden" name="service_id" value="{{$service->id}}">
                                    <script src="https://js.paystack.co/v1/inline.js"></script>

                                    <button id="featuredPay" type="button" class="btn btn-lg" style="cursor: pointer;
                                    display: block; margin-top: 5px; background-color: #cc8a19; color: #fff" onclick="payWithPaystack1(1000)">Make Payment</button>
                                </form>

                            </li>
                        @endif

                        {{-- <li class="list-group-item" style="width: 100%">
                            <strong>Images </strong>
                            <div class="images">
                                @foreach ($service->images as $image)
                                    <div class="image-list">
                                        <img src="{{ asset('uploads/services/'.$image->image_path) }}" alt="{{ $service->name }}">
                                    </div>
                                @endforeach
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="box box-default">
                <div class="box-header">
                    <h2 class="box-title" style="font-weight: 700">Service Images</h2>
                    <p>Add more images to describe your service!</p>
                </div>
                <div class="box-body">
                        @forelse ($service->images as $image)
                            <div style="display: inline-flex; flex-wrap: wrap">
                                <div>
                                    <img src="{{ asset('uploads/services/'.$image->image_path) }}" alt="" style="display: block;width:100px;">
                                    @if ($service->images->count() != 1)
                                        <a href="{{ route('service.image.delete', ['id' => $image->id, 'service_id' => $service->id]) }}" style="display:block">Delete</a>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p>You don't have other images yet!</p>
                        @endforelse
                    </div>

                    @if (Auth::User()->badgetype == 1 && $service->images->count() < 10)
                        <p style="color: rgb(252, 85, 85); font-size: 16px"> {{ 10 - $service->images->count() }} image{{ 10 - $service->images->count() > 1 ? 's' : '' }} remaining.</p>
                        <p> {{ 10 - $service->images->count() }} remaining.</p>
                        <form action="{{ route('service.images.store', ['id' => $service->id]) }}" method="POST" class="dropzone" id="dropzone" enctype="multipart/form-data">
                            @csrf
                            <div class="dz-default dz-message">
                                Click here to add your images <br>
                                <small style="color: rgb(182, 66, 66) !important">When you are done click the upload button down below!</small>
                            </div>
                        </form>
                        <br>
                        <center>
                            <button id="submit-all" class="btn btn-success" style="height: 40px;"> Click to upload</button>
                            <a href="{{ route('serviceDetail', ['slug' => $service->slug]) }}" class="btn btn-danger show-page-vs-btn" style="height: 40px; line-height: 29px;" target="_blank"> View Service</a>
                        </center>
                    @elseif (Auth::User()->badgetype == 2 && $service->images->count() < 8)
                        <p style="color: rgb(252, 85, 85); font-size: 16px"> {{ 8 - $service->images->count() }} image{{ 8 - $service->images->count() > 1 ? 's' : '' }} remaining.</p>
                        <form action="{{ route('service.images.store', ['id' => $service->id]) }}" method="POST" class="dropzone" id="dropzone" enctype="multipart/form-data">
                            @csrf
                            <div class="dz-default dz-message">
                                Click here to add your images <br>
                                <small style="color: rgb(182, 66, 66) !important">When you are done click the upload button down below!</small>
                            </div>
                        </form>
                        <br>
                        <center>
                            <button id="submit-all" class="btn btn-success" style="height: 40px;"> Click to upload</button>
                            <a href="{{ route('serviceDetail', ['slug' => $service->slug]) }}" class="btn btn-danger show-page-vs-btn" style="height: 40px; line-height: 29px;" target="_blank"> View Service</a>
                        </center>
                    @elseif (Auth::User()->badgetype == 3 && $service->images->count() < 6)
                        <p style="color: rgb(252, 85, 85); font-size: 16px"> {{ 6 - $service->images->count() }} image{{ 6 - $service->images->count() > 1 ? 's' : '' }} remaining.</p>
                        <form action="{{ route('service.images.store', ['id' => $service->id]) }}" method="POST" class="dropzone" id="dropzone" enctype="multipart/form-data">
                            @csrf
                            <div class="dz-default dz-message">
                                Click here to add your images <br>
                                <small style="color: rgb(182, 66, 66) !important">When you are done click the upload button down below!</small>
                            </div>
                        </form>
                        <br>
                        <center>
                            <button id="submit-all" class="btn btn-success" style="height: 40px;"> Click to upload</button>
                            <a href="{{ route('serviceDetail', ['slug' => $service->slug]) }}" class="btn btn-danger show-page-vs-btn" style="height: 40px; line-height: 29px;" target="_blank"> View Service</a>
                        </center>
                    @elseif (Auth::User()->badgetype == 0 && $service->images->count() < 4)
                        <p style="color: rgb(252, 85, 85); font-size: 16px"> {{ 4 - $service->images->count() }} image{{ 4 - $service->images->count() > 1 ? 's' : '' }} remaining.</p>
                        <form action="{{ route('service.images.store', ['id' => $service->id]) }}" method="POST" class="dropzone" id="dropzone" enctype="multipart/form-data">
                            @csrf
                            <div class="dz-default dz-message">
                                Click here to add your images <br>
                                <small style="color: rgb(182, 66, 66) !important">When you are done click the upload button down below!</small>
                            </div>
                        </form>
                        <br>
                        <center>
                            <button id="submit-all" class="btn btn-success" style="height: 40px;"> Click to upload</button>
                            <a href="{{ route('service_detail_4_provider', ['slug' => $service->slug]) }}" class="btn btn-danger show-page-vs-btn" style="height: 40px; line-height: 29px;" target="_blank"> View Service</a>
                        </center>
                    @else
                        <p style="font-size: 16px; text-align:center; margin: 20px 0"><a href="{{ route('seller.service.badges') }}" style="color: #cc8a19;" >Upgrade</a> your account with a badge to upload more images.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
  </section>

</div>


 <script>

                base_Url = "{{ url('/') }}"

                var _token = $("input[name='_token']").val();
                var paystack_pk = "{{env('paystack_pk')}}";

                // var email1 = $("#email-address3").val();
                var amount = $("#featured_amount").val();
                var email = $("#user_email").val();
                var service_id = document.getElementById("service_id").value;
                function payWithPaystack1() {

                    // return console.log('sasas');
                     const featuredButton = document.getElementById("featuredPay");
                        // $("#featuredPay").attr("disabled", true);
                        featuredButton.disabled  = true;

                    var handler = PaystackPop.setup({
                        key: paystack_pk,
                        email: document.getElementById("user_email").value,
                        amount: 100000,
                        ref: ''+'FEATURED-'+Math.floor((Math.random() * 1000000000) + 1),
                        metadata: {
                            custom_fields: [{
                                display_name: "Mobile Number",
                                variable_name: "mobile_number",
                                value: "+2348012345678"
                            }]
                        },
                        callback: function(response) {
                            // return console.log('sasas');
                            const featuredButton = document.getElementById("featuredPay");
                            featuredButton.disabled  = true;
                            var email = document.getElementById("user_email").value;
                            var service_id = document.getElementById("service_id").value;
                            var amount = $("#featured_amount").val();
                            var ref_no1 =  response.reference;

                            $.ajax({
                              method: "POST",
                              url: base_Url + '/provider/service/create_pay_featured',
                              dataType: "json",
                              data: {
                                _token: _token,
                                email: email,
                                amount: amount,
                                service_id: service_id,
                                ref_no: ref_no1,
                              },
                              success: function (data) {
                                  console.log(data)
                                  toastr.success("Your Service has been successfully featured");

                              },
                              error: function(error) {
                                  console.log(error)
                              }
                            })
                        },
                        onClose: function() {
                            alert('window closed');
                        }
                    });
                    handler.openIframe();
                }



            </script>
@endsection


@section('extra-scripts')
    @if (Auth::User()->badgetype == 1 && $service->images->count() != 10)
    <input hidden id="badge_type_1" type="number" value="{{  10 - $service->images->count() }}">
    <input hidden id="user_1_image_remaining" type="number" value="{{ (10 - $service->images->count()) > 1 ? 's' : '' }}">
    <script type="text/javascript">
        Dropzone.options.dropzone = {
            maxFiles: document.getElementById('badge_type_1').value,
            maxFilesize: 10,
            parallelUploads: 9,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            autoProcessQueue: false,
            init: function() {
                var dpzMultipleFiles = this;
                var submitButton = document.querySelector("#submit-all");
                submitButton.addEventListener("click", function () {
                    dpzMultipleFiles.processQueue();
                });

                this.on("queuecomplete", function () {
                    location.reload();
                });
                this.on("maxfilesexceeded", function(file){
                    toastr.error("You can't upload more than " + document.getElementById('badge_type_1').value + " file"+document.getElementById('user_1_image_remaining').value+".");
                });
            },
            success: function(file, response)
            {
                file.previewElement.id = response.success;
                var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
                file.previewElement.querySelector("img").alt = response.success;
                olddatadzname.innerHTML = response.success;
            },
            error: function(file, response)
            {
                if($.type(response) === "string")
                    var message = response; //dropzone sends it's own error messages in string
                else
                    var message = response.message;
                file.previewElement.classList.add("dz-error");
                _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                _results = [];
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i];
                    _results.push(node.textContent = message);
                }
                return _results;
            }
        };
    </script>

    @elseif (Auth::User()->badgetype == 2 && $service->images->count() != 8)
    <input hidden id="badge_type_2" type="number" value="{{ 8 - $service->images->count() }}">
    <input hidden id="user_2_image_remaining" type="number" value="{{ (8 - $service->images->count()) > 1 ? 's' : '' }}">
    <script type="text/javascript">
        Dropzone.options.dropzone = {
            maxFiles: document.getElementById('badge_type_2').value,
            maxFilesize: 10,
            parallelUploads: 7,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            autoProcessQueue: false,
            init: function() {
                var dpzMultipleFiles = this;
                var submitButton = document.querySelector("#submit-all");
                submitButton.addEventListener("click", function () {
                    dpzMultipleFiles.processQueue();
                });

                this.on("queuecomplete", function () {
                    location.reload();
                });
                this.on("maxfilesexceeded", function(file){
                    toastr.error("You can't upload more than " + document.getElementById('badge_type_2').value + " file"+document.getElementById('user_2_image_remaining').value+".");
                });
            },
            success: function(file, response)
            {
                file.previewElement.id = response.success;
                var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
                file.previewElement.querySelector("img").alt = response.success;
                olddatadzname.innerHTML = response.success;
            },
            error: function(file, response)
            {
                if($.type(response) === "string")
                    var message = response; //dropzone sends it's own error messages in string
                else
                    var message = response.message;
                file.previewElement.classList.add("dz-error");
                _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                _results = [];
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i];
                    _results.push(node.textContent = message);
                }
                return _results;
            }
        };
    </script>
    @elseif (Auth::User()->badgetype == 3 && $service->images->count() != 6)
    <input hidden id="badge_type_3" type="number" value="{{  6 - $service->images->count() }}">
    <input hidden id="user_3_image_remaining" type="text" value="{{ (6 - $service->images->count()) > 1 ? 's' : '' }}">
    <script type="text/javascript">
        Dropzone.options.dropzone = {
            maxFiles: document.getElementById('badge_type_3').value,
            maxFilesize: 10,
            parallelUploads: 5,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            autoProcessQueue: false,
            init: function() {
                var dpzMultipleFiles = this;
                var submitButton = document.querySelector("#submit-all");
                submitButton.addEventListener("click", function () {
                    dpzMultipleFiles.processQueue();
                });

                this.on("queuecomplete", function () {
                    location.reload();
                });
                this.on("maxfilesexceeded", function(file){
                    toastr.error("You can't upload more than " + document.getElementById('badge_type_3').value + " file"+ document.getElementById('user_3_image_remaining').value + ".");
                });
            },
            success: function(file, response)
            {
                file.previewElement.id = response.success;
                var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
                file.previewElement.querySelector("img").alt = response.success;
                olddatadzname.innerHTML = response.success;
            },
            error: function(file, response)
            {
                if($.type(response) === "string")
                    var message = response; //dropzone sends it's own error messages in string
                else
                    var message = response.message;
                file.previewElement.classList.add("dz-error");
                _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                _results = [];
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i];
                    _results.push(node.textContent = message);
                }
                return _results;
            }
        };
    </script>
    @elseif (Auth::User()->badgetype == 0 && $service->images->count() != 4)
    <input hidden id="badge_type_4" type="number" value="{{  4 - $service->images->count() }}">
    <input hidden id="user_4_image_remaining" type="number" value="{{ (4 - $service->images->count()) > 1 ? 's' : '' }}">
    <script type="text/javascript">
        Dropzone.options.dropzone = {
            maxFiles: document.getElementById('badge_type_4').value,
            maxFilesize: 10,
            parallelUploads: 3,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            autoProcessQueue: false,
            init: function() {
                var dpzMultipleFiles = this;
                var submitButton = document.querySelector("#submit-all");
                submitButton.addEventListener("click", function () {
                    dpzMultipleFiles.processQueue();
                });

                this.on("queuecomplete", function () {
                    location.reload();
                });
                this.on("maxfilesexceeded", function(file){
                    toastr.error("You can't upload more than " + document.getElementById('badge_type_4').value + " file"+ document.getElementById('user_4_image_remaining').value +".");
                });
            },
            success: function(file, response)
            {
                file.previewElement.id = response.success;
                var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
                file.previewElement.querySelector("img").alt = response.success;
                olddatadzname.innerHTML = response.success;
            },
            error: function(file, response)
            {
                if($.type(response) === "string")
                    var message = response; //dropzone sends it's own error messages in string
                else
                    var message = response.message;
                file.previewElement.classList.add("dz-error");
                _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                _results = [];
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i];
                    _results.push(node.textContent = message);
                }
                return _results;
            }
        };
    </script>
    @endif
@endsection
