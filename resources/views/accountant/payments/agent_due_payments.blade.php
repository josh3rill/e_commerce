
@extends('layouts.accountant')

@section('title')
All Agents Due Payments |
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 518px;">
	<section class="content-header">

           <h1>
           All Agents Due Payments
            <br><small>View and attend to all agents due payments.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <section class="content">
	<div class="container">
		@include('layouts.backend_partials.status')
	</div>

	<section class="content">

		<div class="row">
			<div class="col-xs-12">



				<div class="box" >
					<div class="box-header">
						<h3 class="box-title">Due Payments</h3>
					</div>
					<button type="button" onclick="generatePayment()" class="btn btn-success">Generate Payment</button>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> # </th>
									<th style="display: none;"></th>
									<th> Name </th>
									<th> Agent Code </th>
									<th>Account Name</th>
									<th>Bank</th>
									<th>Account Number</th>

									<th> Total Remaining Balance </th>
								</tr>
							</thead>
							<tbody>
								@forelse($dues as $key => $unpaid_payment)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td style="display: none;" id="userID">{{ $unpaid_payment->id }}</td>
                                        <td> {{ $unpaid_payment->name }} </td>
                                        <td> {{ $unpaid_payment->agent_code }} </td>
                                        <td> {{ $unpaid_payment->accountname }} </td>
                                        <td> {{ $unpaid_payment->bankname }} </td>
                                        <td> {{ $unpaid_payment->accountno }} </td>


                                        <td> ₦{{ number_format($unpaid_payment->refererAmount) }} </td>

                                    </tr>

								@empty

								@endforelse


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
</div>



<script type="text/javascript">
    function makePayment2()
    {
        event.preventDefault();
        var base_url = "{{ url('/') }}"
       let user_id = document.getElementById('userID').innerHTML
       if (confirm("Are you sure you want to pay this agent?")) {
	       	$.ajax({
	       		headers: {
			    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  	},
	            url: base_url + "/accountant/pay-agent-due/"+user_id,
	            method: 'POST',
	            success: function(result)
	            {
	            	toastr.success("{{ Session::get('message') }}")
	            	location.reload()
	            }

	        });

       } else {
        	toastr.error("{{ Session::get('message') }}")
       		location.reload()
       }

    }

</script>
<script type="text/javascript">
	function generatePayment()
	{
		event.preventDefault();
		var base_url = "{{ url('/') }}"
       if (confirm("Are you sure you want to generate payment?")) {
	       	$.ajax({
	       		headers: {
			    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  	},
	            url: base_url + "/accountant/generate-payment",
	            method: 'POST',
	            success: function(result)
	            {
	            	toastr.success("{{ Session::get('message') }}")
	            	location.reload()
	            }

	        });

       } else {
        	toastr.error("{{ Session::get('message') }}")
       		location.reload()
       }

	}
</script>
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
            	alert(results);
            	console.log(results);
            	if (results.success === true)  {
swal("Done!", results.message, "success");
document.getElementById("activate").innerHTML = results.message;
document.getElementById("active_text").innerHTML = results.status_message;
if (results.message === 'Activate') {
	document.getElementById("active_text").style.color='#dc3545';

} else {
		document.getElementById("active_text").style.color='blue';

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


