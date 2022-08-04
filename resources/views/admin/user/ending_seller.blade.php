
@extends('layouts.admin')

@section('title', 'Subscription About To End Users Table | ')

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
						<h3 class="box-title"> Subscription About To End Table </h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
                            <table class="display table table-bordered data_table_main">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Phone </th>
                                        <th> User Registration Date </th>
                                        <th> Last Subscription Paid</th>
                                        <th> Subscription End Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sellers as $key => $seller)
                                        <tr>
                                            <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                            <td> {{ $seller->name }} </td>
                                            <td><span class="text-muted"> </i> {{ $seller->email }} </span> </td>
                                            <td><span class="text-muted"> </i> {{ $seller->phone }} </span> </td>
                                            <td><span class="text-muted"> </i> {{ $seller->created_at->format('d-m-Y') }} </span> </td>
                                            <td> {{ $seller->subscriptions->first()->last_amount_paid }} </span></td>
                                            <td> {{ Carbon\Carbon::parse($seller->subscriptions->first()->subscription_end_date)->format('d-m-Y') }} </span></td>                                                            
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>


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
              alert('failed');

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


