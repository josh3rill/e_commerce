@extends('layouts.agent')

@section('title', 'Agent\'s Dashboard | ')

@section('content')
<style>
    .content-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }
    .navbar-top-post-btn a{
        font-size: 15px !important;
        color:#fff
    }
    .refererArea h4{
        text-transform: uppercase;
    }
    .refererArea h4 small{
        font-size: 13px;
    }
    .refererArea h4 small a{
        color: #10CFBD;
        text-transform: initial;
    }
    .refererArea h4 small a:hover{
        color: #95f3ea;
        cursor: pointer;
    }
    .modal-title{
        text-transform: uppercase;
    }
    .form-text{
        display: block
    }
    .tab-content{
        padding-top: 20px;
    }
    @media (max-width: 768px){
        .content-header{
            padding: 0 5px 10px 10px;
        }
        .refererArea h4{
            font-size: 14px;
        }
        .refererArea .btn{
            font-size: 11px;
        }
        .navbar-top-post-btn a{
            font-size: 11px !important;
            margin-top: 40px
        }
        span.info-box-icon.push-bottom.bg-warning {
            display: none !important;
        }
        .info-box-content{
            margin-left: 0;
        }
        .info-box-text, .info-box-number{
            font-size: 14px;
        }
        .progress-description .btn{
            font-size: 9px;
        }
    }
</style>

<div class="wrapper">


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">

            @if(isset(Auth::user()->agent_code))
            <div class="refererArea">
                <h5>Here Is Your Agent Dashboard</h5>

                <h4>My Agent Code <small>(<a data-toggle="modal" data-target="#referralInfoModal">How it works?</a>)</small></h4>
                <div class="referralContainer">
                    <div>
                        <button class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="{{Auth::user()->agent_code}}" onclick="copyToClipboard('#refererlinkText') ">
                            Click here to copy your code
                        </button>
                    </div>
                    <div>
                        <p id="refererlinkText" hidden>{{ Auth::user()->agent_code }}</p>
                    </div>
                </div>
            </div>
            @endif
        </section>

        <section class="content">

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6 top-box-card">
                    <div class="info-box">
                        <a href="{{route ('agent.referal.all') }}">
                            <span class="info-box-icon push-bottom bg-warning">
                                <i class="fa fa-users text-white" aria-hidden="true"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text"> My Refferal{{ $agent_code_users_count > 1 ? 's' : '' }} </span>
                                <span class="info-box-number"> {{ $agent_code_users_count }} </span>
                            </div>
                            <!-- /.info-box-content -->
                        </a>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="info-box">
                        <span class="info-box-icon push-bottom bg-warning">  <i class="fa fa-money text-white" aria-hidden="true"></i> </span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Total  Earnings </span>
                            <span class="info-box-number"> ₦{{ $agent_amount_earned }} </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <a href="{{route('agent.notification.all')}}">
                        <div class="info-box">
                            <span class="info-box-icon push-bottom bg-warning">  <i class="fa fa-bullhorn text-white" aria-hidden="true"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text"> Gen. Notice{{ Auth::user()->notifications->count() > 1 ? 's' : '' }} </span>
                            <span class="info-box-number"> {{ Auth::user()->notifications->count() }} </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <a href="{{route('agent.payment.history')}}">
                        <div class="info-box">
                            <span class="info-box-icon push-bottom bg-warning">  <i class="fa fa-university text-white" aria-hidden="true"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text"> Payment History </span>
                                <!-- <span class="info-box-number"> ₦{{ $agent_amount_earned }} </span> -->
                                {{-- <div class="progress">
                                    <div class="progress-bar progress-bar-danger" style=""></div>
                                </div> --}}
                                <span class="progress-description">
                                    <!-- Extra content can go here -->
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
        </section>

 <section class="content">

      <div class="row">
       <div class="col-xs-12">

        <div class="box" >
         <div class="box-header">
          <h3 class="box-title">Your Referrals </h3>
          <h5 class="text-success downline_text" style="display: none;"> These are the bonuses you've gained from this particular referer </h5>
      </div>

  <div class="table-responsive table-bordered ">
        @if(isset($myreferrals))

        <!-- /.box-header -->
        <div id="main_referer_table" class="box-body">
          <div class="table-responsive">
            <table class="display table table-bordered data_table_main">
                <thead>
                    <tr>
                     <th> S/N </th>
                     <!-- <th> Referee Name </th> -->

                     <th> Referer Name </th>
                     <!-- <th> Agent Code </th> -->
                     <th> Total Earnings </th>
                     <th> Date Registered </th>
                     <th> Action </th>

                                        <!-- <th> Status </th>
                                            <th> Action </th> -->
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($myreferrals as $key =>  $myreferral)


                                        <tr role="row" class="odd">
                                           <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                           <!-- <td> {{ $myreferral->user->name }} </td> -->
                                           <td> {{ $myreferral->user->name }} </td>
                                           <td> {{ $myreferral->user->refererAmount }} </td>
                                           <td> {{ $myreferral->created_at->diffForHumans() }} </td>
                                           <!-- <td> {{ $myreferral->status == 1 ? 'read' : 'unread' }} </td> -->

                                           <td class="center">
                                            <a onclick="getDetails({{$myreferral->user->id}})" class="btn btn-warning "><i class="fa fa-eye"></i>View Downline</a>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>


                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    @endif



                    <!-- /.box-header -->
                    <div id="downline_table" style="display: none;" class="box-body">
                      <div class="table-responsive">
                        <table class="display table table-bordered data_table_main">
                            <thead>
                                <tr>
                                    <th> Referer Name </th>
                                    <th> Level 1 Bonus </th>
                                    <th> Level 2 Bonus </th>
                                    <th> Level 3 Bonus </th>
                                    <th> Level 4 Bonus </th>
                                    <th> Total Bonus From This Referer </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr role="row" class="odd">
                                    <td id="name">  </td>
                                    <td id="level1">  </td>
                                    <td id="level2">  </td>
                                    <td id="level3">  </td>
                                    <td id="level4">  </td>
                                    <td id="total">  </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <button class="btn btn-warning downline_text w-10" style="display: none;" onclick="goBack()">Go Back</button>
                    </div>
                    </div>
                    <!-- /.box-body -->

                </div>
            </div>
        </div>
    </div>
    <div>
        <div id="referralInfoModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                        <h4 class="modal-title">How it Works</h4>
                    </div>
                    <div class="modal-body">
                        <div class="tabbing tabbing-box agent-registration-modal">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Agent Info</a></li>
                                <li><a data-toggle="tab" href="#menu1">Benefits</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <p>We are happy to work with you and offer to you one of the best marketing careers in the country, where you have an opportunity to make millions of Naira yearly.</p>
                                    <p><strong>Note:</strong> The registration to be an agent on EFContact will attract a fee of <strong>&#8358;500.</strong></p>
                                    <p>To become our agent, you will be required to fill out the form below and be accepted by the company. When we receive your online request, a reference code and another form would be sent to you to finalize your application.</p>
                                    <p>EFContact provides an opportunity for a part-time agent to make on average ₦50,000.00 monthly and a full time agent to make on average ₦100,000.00  or monthly. On top of your basic commission, there are other incentives which may generate millions of Naira to you yearly.</p>
                                    <p>When you are approved, you will receive your agent code and a dashboard. The dashboard is where all your activities and daily income are displayed.  We pay commissions weekly not monthly.  You will also be able to refer people to market the EFcontact and make extra money on top of your own sales. If you are interested please click <a id="two-tab" data-toggle="tab" href="#agentRegister" role="tab" aria-controls="one" aria-selected="false" style="color: #cc8a19; font-weight: 700">HERE</a> :</p>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    {!! $pages_contents->benefit_of_efcontact ? $pages_contents->benefit_of_efcontact : '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" style="background-color: #cc8a19; color: #fff" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </section>


                </div>
            </div>


            <script>
        // $(function () {
        //     $("#postServiceModal").modal('show');
        // })
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");

            toastr.options.progressBar = true
            toastr.options.positionClass = 'toast-top-left'
            toastr.success("Referral Link Copied!")

            $temp.remove();

        }
    </script>




      <script type="text/javascript">

       function getDetails(id) {

        $.ajax({
          method: "GET",
          url: '/agent/referer/downline/' + id,

          success: function (data) {
            console.log(data);
        // toastr.success('You have purchased a new subscription!');
        $('#downline_table').css("display", "block");
        $('.downline_text').css("display", "block");
        $('#main_referer_table').css("display", "none");
        $('#referer_text').css("display", "none");

                                // $("#sub_end2").innerHTML = data.new_date;
                                $("#name").html(data.success.name);
                                if (data.success.level1) {
                                    var level1_value = 200;
                                    $("#level1").html(200);
                                }else{
                                    var level1_value = 0;
                                }
                                if (data.success.level2) {
                                    var level2_value = 150;
                                    $("#level2").html(150);
                                }else{
                                    var level2_value = 0;
                                }
                                if (data.success.level3) {
                                    var level3_value = 100;
                                    $("#level3").html(100);
                                }else{
                                    var level3_value = 0;
                                }
                                if (data.success.level4) {
                                    var level4_value = 50;
                                    $("#level4").html(50);
                                }else{
                                    var level4_value = 0;
                                }


                                var total =  level1_value +  level2_value + level3_value + level4_value;
                                console.log(total);
                                $("#total").html(total);

                                 // $("#level2").html(data.success.level2);
                                 // $("#level3").html(data.success.level3);

                                    // if (data.success.level1) {
                                    //  data.success.level1 = 200;
                                    // }
                                    // if (data.success.level2) {
                                    //  data.success.level2 = 150;
                                    // }
                                    // if (data.success.level3) {
                                    // data.success.level3 = 100;
                                    // }

                                 // $('#sub_message').css("display", "block");
                             },
                             error: function(error) {
                              console.log(error)
                          }
                      })
    }
</script>
<script type="text/javascript">
    function goBack(){
    // $('#main_referer_table').css("display", "block");
    // $('#downline_table').css("display", "none");
      // window.history.back();
          location.reload(true)

  }
</script>

    @endsection
