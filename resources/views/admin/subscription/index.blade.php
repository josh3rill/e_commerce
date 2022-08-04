
@extends('layouts.admin')

@section('title', 'All Users/Subscriptions | ')

@section('content')

    <div class="content-wrapper" style="min-height: 518px;">

        <div class="container">
            @include('layouts.backend_partials.status')
        </div>

        <section class="content">

            <div class="row">
                <div class="col-xs-12">



                    <div class="box" >
                        <div class="box-header">
                            <h3 class="box-title"> Subscription Table</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="display table table-bordered data_table_main">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Phone </th>
                                        <th> role </th>
                                        <th> Registration Date</th>
                                        <th> Sub. End Date</th>
                                        <th> Status </th>
                                        <th> Services</th>
                                    </tr>
                                </thead>

                                    </tbody>
                                        @foreach($all_subscriptions as $key => $all_subscription)

                                    </tr>
                                        <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                        <td> {{ $all_subscription->subscriptionable->name }} </td>
                                        <td><span class="text-muted"></i> {{ $all_subscription->subscriptionable->email }} </span> </td>
                                        <td><span class="text-muted"> </i> {{ $all_subscription->subscriptionable->phone ?? 'no phone'}} </span> </td>
                                        <td> {{ $all_subscription->subscriptionable->role }} </td>
                                        <td> {{ $all_subscription->subscriptionable->created_at->format('d/m/Y') }} </span></td>
                                        <td> {{ $all_subscription->subscription_end_date }} </span></td>
                                        <td>
                                            @if($all_subscription->subscriptionable->status == 1)
                                            <span><p id="active_text">Activated</p></span>
                                            @elseif($all_subscription->subscriptionable->status == 0)
                                            <span id="active_text2">Deactivated</span>
                                            @endif
                                        </td>

                                        <td>
                                        @if($all_subscription->subscriptionable->services->count())
                                            <span><p id="active_text">{{$all_subscription->subscriptionable->services->count()}}</p></span>
                                            @elseif($all_subscription->subscriptionable->services->count() == 0)
                                            <span id="active_text2">Deactivated</span>
                                            @endif
                                        </td>

                                </tr>

                                @endforeach


                            </tbody>


                        </table>


                    </div>
                    <!-- /.box-body -->
                </div>


                <!-- /.content -->
            </div>



        </div>

    </div>
</section>




<script>
        function activateUser22(id) {

    event.preventDefault();
    if (confirm("Are you sure you want to change this user's status?")) {

        $.ajax({
            url: '/activate_user/' + id,
            method: 'get',
            success: function(result){
              alert('successfull');
                window.location.assign(window.location.href);
            }
        });
// '/admin/delete/faqs/{id}'

    } else {
              alert('Attempt failed');

        console.log('Delete process cancelled');

    }

    }
    </script>



    <script type="text/javascript">
function activateUser(id) {
swal({
title: "Change this user's status?",
text: "Please be sure and then confirm!",
type: "warning",
showCancelButton: !0,
confirmButtonText: "Yes, change it!",
cancelButtonText: "No, dont bother!",
cancelButtonColor: '#dc3545',
reverseButtons: !0
}).then(function (e) {
if (e.value === true) {

$.ajax({
            url: '/activate_user/' + id,
            method: 'get',
            success: function(results){
            	// alert(results);
            	console.log(results);
            	if (results.success == true)  {
swal("Done!", results.message, "success");
document.getElementById("activate1").innerHTML = results.message;
document.getElementById("activate2").innerHTML = results.status_message;
if (results.message === 'Activate') {
	document.getElementById("active_text").style.color='#dc3545';

} else {
		document.getElementById("active_text2").style.color='blue';

}


window.location.assign(window.location.href);


} else {
swal("Error!", results.message, "error");
}

            }
        });

} else {
e.dismiss;
}
}, function (dismiss) {
return false;
})
}
</script>

@endsection


