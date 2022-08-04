


{{-- @include('layouts.backend_partials.status') --}}


<div class="box">

	<div class="box-header">
		<h3 class="box-title"> Referal Payment Requests</h3>
		{{-- <a href="{{ route('seller.service.create') }} " class="btn btn-warning model_img img-responsive pull-right"> Add Aervice </a> --}}
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table class="table table-hover">

			<tbody>

				<tr>
					<th> # </th>
					<th style="display: none;"></th>
					<th> Name </th>
					<th> Amount Requested </th>
					<th> Total Remaining Balance </th>
					<th> Payment Status </th>
					<th> Due Date </th>
					<th> Action </th>
				</tr>

				
					@forelse($payments as $key=>$all_payment)
					<tr>
						<td>{{ ++$key }}</td>
						<td style="display: none;" id="userID">{{ $all_payment->id }}</td>
						<td> {{ $all_payment->getOwner()->name ?? '' }} </td>
						<td>₦<span class="text-muted">{{ number_format($all_payment->amount_requested) }} </span> </td>
						<td> ₦{{ number_format($all_payment->getOwner()->refererAmount ?? '0') }} </td>
						@if($all_payment->is_paid == 0)

							<td> <span class="text text-danger">Pending</span></td>
						@else
							<td> <span class="text text-success">Paid</span></td>
						@endif
						@php
							$today = new \Carbon\Carbon;
							if($today->dayOfWeek == \Carbon\Carbon::FRIDAY){
								echo "<td> <span class='text text-warning'>Due</span></td>";
							} else {
								echo "<td> <span class='text text-danger'>Not Due</span></td>";
							}
							
						@endphp
						@if($all_payment->is_paid == 0)
						<td><button class="btn btn-warning" onclick="makepayment()">Pay</button> </td>
						@else
						<td><button class="btn btn-success disabled" id="is_paid">Paid</button> </td>
						@endif
					@empty
					</tr>
					@endforelse

			
			

		</tbody>
	</table>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
	{{ $payments->links() }}
</div>
</div>




@include('seller/modal/create_service')
