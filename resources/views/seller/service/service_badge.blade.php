
@extends('layouts.seller')

@section('title', 'Request for Badge | ')

@section('content')
<div class="content-wrapper" style="min-height: 868px;">
    @include('layouts.backend_partials.status')

    <section class="content-header">
        <h3>Get a Badge</h3>
    </section>

    <section class="content">
     <div class="row text-center">
      <div class="col-md-4">
      </div>
      <div class="col-md-4">

        <div class="box box-primary">
          {{--<form action="{{route('saveService4Badge')}}" method="GET">--}}
            <form>
              {{ csrf_field() }}
              <select class="form-control" id="service_id11" required name="service_id">
                <option value=0>-- Select  the service --</option>
                @if(isset($services))
                @foreach($services as $service)
                <option value="{{ $service->id }}"> {{ $service->name }}</option>
                @endforeach
                @endif
              </select>

              @if ($errors->has('service'))
              <span class="helper-text" data-error="wrong" data-success="right">
                <strong class="text-danger">{{ $errors->first('service') }}</strong>
              </span>
              @endif
              <button class="btn btn-outline-warning btn-submit4">click to confirm</button>
            </form>
          </div>
        </div>
        <div class="col-md-4">
        </div>
      </div>

      <br />

      <div class="row">

        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="https://efcontact.com/img/verified-gold-512.png" alt="">

              <h3 class="profile-username text-center">Trusted Badge</h3>
              <p class="text-center">Advantages of having a Trusted Badge</p>
              <ol>
                <li>Post as 8 images of your services</li>
                <li>Gain access to phone numbers of unlimited numbers of buyers</li>
                <li>Appear on the top when buyers search for services related to yours</li>
              </ol>
              <hr>
              <img class="profile-user-img img-responsive img-circle" src="https://efcontact.com/img/48025305-0-WhatsApp-Green-Tick.png" alt="">

              <h3 class="profile-username text-center">Verified Badge</h3>
              <p class="text-center">Advantages of having a Verified Badge</p>
              <ol>
                <li>Post 6 images of your services</li>
                <li>Gain access to phone numbers of unlimited numbers of buyers</li>
                <li>Appear beneath Trusted badge holders when buyers search for services related to yours</li>
              </ol>
              <hr>
              <img class="profile-user-img img-responsive img-circle" src="https://efcontact.com/img/instagram-verified-logo-11549386033fpzr9vfugd.png" alt="">

              <h3 class="profile-username text-center">Basic Badge</h3>
              <p class="text-center">Advantages of having a Basic Badge</p>
              <ol>
                <li>Post 4 images of your services</li>
                <li>Gain access to phone numbers of unlimited numbers of buyers</li>
              </ol>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              <li class="active"><a href="#timeline" data-toggle="tab" aria-expanded="true">Trusted Badge</a></li>
              <li class=""><a href="#password" data-toggle="tab" aria-expanded="false">Verified Badge</a></li>
              <li class=""><a href="#verified" data-toggle="tab" aria-expanded="false">Basic Badge</a></li>
            </ul>

            <div class="tab-content">

              <div class="tab-pane active" id="timeline">
                <form class="form-horizontal form-element">
                  {{ csrf_field() }}

                  <input type="hidden" name="amount1" id="amount1" value="20000" class="form-control">
                  <input type="hidden" name="plan" id="plan" value="Trusted Seller" class="form-control">

                  <input type="hidden" name="seller_id1" id="seller_id1" value="{{Auth::User()->id}}" class="form-control">
                  <input type="hidden" name="badge_type1" id="badge_type1" value="Trusted" class="form-control">
                  <input type="hidden" name="form_service_id" id="form_service_id" class="form-control">
                  {{--<div class="form-group">
                    <select class="form-control"  name="service_id2">
                      <option value="">-- Select  the service --</option>
                      @if(isset($services))
                      @foreach($services as $service)
                      <option value="{{ $service->id }}"> {{ $service->name }}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>--}}

                  <input type="hidden" name="type" value="card" class="form-control">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                    <div class="col-sm-10">
                      <input type="text" id="seller_name1" class="form-control" name="seller_name1" value="{{Auth::User()->name}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email-address1" id="email-address1" value="{{Auth::User()->email}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone1" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="phone1" id="phone1"
                      value="{{Auth::User()->phone}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" name="address" id="address">{{Auth::User()->address == null ? "" : Auth::User()->address}}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                       <input type="checkbox" id="basic_checkbox_1" checked="" required="">
                       <label for="basic_checkbox_1"> I agree to the</label>
                       &nbsp;&nbsp;&nbsp;&nbsp;<a href="https://efcontact.com/terms-of-use">Terms and Conditions</a>
                     </div>
                   </div>
                 </div>
                 <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <script src="https://js.paystack.co/v1/inline.js"></script>
                    {{--  @if(isset($service_select))--}}

                    <button id="paystack_btn_control1" type="button" class="btn btn-warning" onclick="payWithPaystack1()"> MAKE PAYMENT </button>
                    <small id="error_msg_paystack1" class="text-danger"></small>

                    {{--@endif--}}
        {{-- @if(!isset($service_select))

  <button type="button" disabled class="btn btn-warning" onclick="payWithPaystack1()"> You need to choose a service before you can submit </button>
  @endif--}}

  {{--<button type="button" class="btn btn-submit2 btn-warning"> MAKE confirm </button> --}}
</div>



</div>
</form>

</div>
<!-- /.tab-pane -->


<div class="tab-pane" id="password">

 <form class="form-horizontal form-element">
  {{ csrf_field() }}

  <input type="hidden" name="amount2" id="amount2" value="15000" class="form-control">
  <input type="hidden" name="plan" id="plan" value="Trusted Seller" class="form-control">
  <input type="hidden" name="seller_id2" id="seller_id2" value="{{Auth::User()->id}}" class="form-control">
  <input type="hidden" name="badge_type2" id="badge_type2" value="Verified" class="form-control">

  <input type="hidden" name="type" value="card" class="form-control">
  <div class="form-group">
    <label for="seller_name2" class="col-sm-2 control-label">Full Name</label>

    <div class="col-sm-10">
      <input type="text" id="seller_name2" class="form-control" name="seller_name2" value="{{Auth::User()->name}}">
    </div>
  </div>
  <div class="form-group">
    <label for="email-address2" class="col-sm-2 control-label">Email</label>

    <div class="col-sm-10">
      <input type="email" class="form-control" name="email-address2" id="email-address2" value="{{Auth::User()->email}}">
    </div>
  </div>
  <div class="form-group">
    <label for="phone2" class="col-sm-2 control-label">Phone</label>

    <div class="col-sm-10">
      <input type="number" class="form-control" name="phone2" id="phone2"
      value="{{Auth::User()->phone}}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPhone" class="col-sm-2 control-label">Address</label>

    <div class="col-sm-10">
      <textarea type="text" class="form-control" name="address" id="address">{{Auth::User()->address == null ? "" : Auth::User()->address}}</textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
       <input type="checkbox" id="basic_checkbox_1" checked="" required="">
       <label for="basic_checkbox_1"> I agree to the</label>
       &nbsp;&nbsp;&nbsp;&nbsp;<a href="https://efcontact.com/terms-of-use">Terms and Conditions</a>
     </div>
   </div>
 </div>
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <button id="paystack_btn_control2" type="button" class="btn btn-warning" onclick="payWithPaystack2()"> MAKE PAYMENT2 </button>
    <small id="error_msg_paystack2" class="text-danger"></small>

  </div>
</div>
</form>
</div>
<!-- /.tab-pane -->
<div class="tab-pane" id="verified">
 <form class="form-horizontal form-element">
  {{ csrf_field() }}

  <input type="hidden" name="amount3" id="amount3" value="10000" class="form-control">
  <input type="hidden" name="plan" id="plan" value="Trusted Seller" class="form-control">
  <input type="hidden" name="seller_id3" id="seller_id3" value="{{Auth::User()->id}}" class="form-control">
  <input type="hidden" name="badge_type3" id="badge_type3" value="Basic" class="form-control">

  <input type="hidden" name="type" value="card" class="form-control">
  <div class="form-group">
    <label for="seller_name3" class="col-sm-2 control-label">Full Name</label>

    <div class="col-sm-10">
      <input type="text" id="seller_name3" class="form-control" name="seller_name3" value="{{Auth::User()->name}}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

    <div class="col-sm-10">
      <input type="email" class="form-control" name="email-addres3" id="email-address3" value="{{Auth::User()->email}}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

    <div class="col-sm-10">
      <input type="number" class="form-control" name="phone" id="phone"
      value="{{Auth::User()->phone}}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPhone" class="col-sm-2 control-label">Address</label>

    <div class="col-sm-10">
      <textarea type="text" class="form-control" name="address" id="address">{{Auth::User()->address == null ? "" : Auth::User()->address}}</textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
       <input type="checkbox" id="basic_checkbox_1" checked="" required="">
       <label for="basic_checkbox_1"> I agree to the</label>
       &nbsp;&nbsp;&nbsp;&nbsp;<a href="https://efcontact.com/terms-of-use">Terms and Conditions</a>
     </div>
   </div>
 </div>
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <button id="paystack_btn_control3" type="button" class="btn btn-warning" onclick="payWithPaystack3()"> MAKE PAYMENT3 </button>
    <small id="error_msg_paystack3" class="text-danger"></small>

  </div>



</div>
</form>
</div>
</div>
<!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->

</section>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!-- place below the html form -->


<script type="text/javascript">
/* $('#categories').on('change',function(){
    var categoryID = $(this).val();
    if(categoryID){
        $.ajax({
         type:"GET",
          url:"{{url('seller/service/badges/badger/')}}"+"/"+categoryID,
          // url: 'badges/get-badge-list/'+categoryID,
           success:function(res){
            if(res){
             console.log(categoryID);
            console.log(res);
            alert(res);
            // $("#categ ").empty();

         }else{
                       console.log("not found");
             //$("#sub_categories").empty();
         }
     }
 });
    }else{
        $("#sub_categories").empty();
    }
  }); */
</script>
<script>
  base_Url = "{{url('/')}}"
 var _token = $("input[name='_token']").val();

 var email1 = $("#email-address1").val();
 var amount1 = $("#amount1").val();
 var seller_id1 = $("#seller_id1").val();
 var badge_type1 = $("#badge_type1").val();
 var seller_name1 = $("#seller_name1").val();
 var phone1 = $("#phone1").val();
 //var service_id = $("#service_id2").val();
 function payWithPaystack1(){
  var new_id = document.getElementById("form_service_id").value;
  console.log(new_id);
      console.log(base_Url);


  var handler = PaystackPop.setup({
    key: 'pk_test_cb0fc910bb9fd127519794aa4128be0fd2c354d4',
    email: document.getElementById("email-address1").value,
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
      console.log(ref_no1);
       /* $.ajax({
    url: 'http://www.yoururl.com/verify_transaction?reference='+ response.reference,
    method: 'get',
    success: function (response) {
      // the transaction status is in response.data.status
    }
  });*/
  $.ajax({
    type:'POST',
    {{--url: "{{ route('user.message2') }}",--}}
                    //data: $('#myform').serialize(),
                    url: base_Url + '/seller/service/createpay/',
                    data: {_token:_token, email:email1, amount:amount1, seller_id:seller_id1, badge_type:badge_type1, seller_name:seller_name1, phone:phone1, ref_no:ref_no1, service_id: new_id
                      },
                    success: function(data) {
                      alert(data);
                      console.log('data');
                    }
                  });
     //       console.log(response);
       //   alert('success. transaction ref is ' + response.reference);
     },
     onClose: function(){
      alert('window closed');
    }
  });
  handler.openIframe();
}
</script>

<script type="text/javascript">
 var _token = $("input[name='_token']").val();

 var email2 = $("#email-address2").val();
 var amount2 = $("#amount2").val();
 var seller_id2 = $("#seller_id2").val();
 var badge_type2 = $("#badge_type2").val();

 var seller_name2 = $("#seller_name2").val();
 var phone2 = $("#phone2").val();

 function payWithPaystack2(){
  var handler = PaystackPop.setup({
    key: 'pk_test_cb0fc910bb9fd127519794aa4128be0fd2c354d4',
    email: document.getElementById("email-address2").value,
    amount: document.getElementById("amount2").value * 100,
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
      var ref_no2 = response.reference;
      $.ajax({
        type:'POST',

        url: '/seller/service/createpay/',
        data: {_token:_token, email:email2, amount:amount2, seller_id:seller_id2, badge_type:badge_type2, seller_name:seller_name2, phone:phone2, ref_no:ref_no2 },
        success: function(data) {
          alert(data);
        }
      });
    },
    onClose: function(){
      alert('window closed');
    }
  });
  handler.openIframe();
}
</script>


<script type="text/javascript">


 var _token = $("input[name='_token']").val();

 var email3 = $("#email-address3").val();
 var amount3 = $("#amount3").val();
 var seller_id3 = $("#seller_id3").val();
 var badge_type3 = $("#badge_type3").val();
 var seller_name3 = $("#seller_name3").val();
 var phone3 = $("#phone3").val();

 function payWithPaystack3(){
  var handler = PaystackPop.setup({
    key: 'pk_test_cb0fc910bb9fd127519794aa4128be0fd2c354d4',
    email: document.getElementById("email-address3").value,
    amount: document.getElementById("amount3").value * 100,
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
      var ref_no3 = response.reference;
      $.ajax({
        type:'POST',

        url: '/seller/service/createpay/',
        data: {_token:_token, email:email3, amount:amount3, seller_id:seller_id3, badge_type:badge_type3,
          seller_name:seller_name3, phone3:phone1, ref_no:ref_no3 },
          success: function(data) {
            alert(data);
          }
        });
    },
    onClose: function(){
      alert('window closed');
    }
  });
  handler.openIframe();
}

</script>



<script type="text/javascript">
  $(document).ready(function() {
    document.getElementById("paystack_btn_control1").disabled = true;
    const paystack_btn_control2 =document.getElementById("paystack_btn_control2");

    const paystack_btn_control3 =document.getElementById("paystack_btn_control3");

    document.getElementById("error_msg_paystack1").innerHTML = "Select a service before payment ";
    document.getElementById("error_msg_paystack2").innerHTML = "Select a service before payment ";
    document.getElementById("error_msg_paystack3").innerHTML = "Select a service before payment ";

      //paystack_btn_control1.disabled = true;
      paystack_btn_control2.disabled = true;

      paystack_btn_control3.disabled = true;
      $(".btn-submit4").click(function(e){
        e.preventDefault();

        var _token = $("input[name='_token']").val();

        var service_id = $("#service_id11").val();
        if (service_id == 0) {
          document.getElementById("paystack_btn_control1").disabled = true;

          paystack_btn_control2.disabled = true;

          paystack_btn_control3.disabled = true;
          document.getElementById("error_msg_paystack1").innerHTML = "Select a service before payment ";
          document.getElementById("error_msg_paystack2").innerHTML = "Select a service before payment ";
          document.getElementById("error_msg_paystack3").innerHTML = "Select a service before payment ";
          alert("You have not selected a service");
          return;

        }

        $.ajax({
          type:'POST',
          url: "{{ route('saveService4Badge') }}",
                    //data: $('#myform').serialize(),
                    //url: '/seller/service/createpay/',
                    data: {_token:_token, service_id:service_id },
                    success: function(data) {
                      alert(data.id);
                      document.getElementById("paystack_btn_control1").disabled = false;
                      paystack_btn_control2.disabled = false;

                      paystack_btn_control3.disabled = false;

                      document.getElementById("error_msg_paystack1").innerHTML = " ";
                      document.getElementById("error_msg_paystack2").innerHTML = " ";

                      document.getElementById("error_msg_paystack3").innerHTML = " ";
                      document.getElementById("form_service_id").value = data.id;


                      //printMsg(data);
                    }
                  });
      });
    });
  </script>
  @endsection
