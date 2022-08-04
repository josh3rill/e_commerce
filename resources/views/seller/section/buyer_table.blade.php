

	

	<div class="box">

		<div class="box-header">
			<h3 class="box-title"> Buyer Table</h3>

@if ( true == false )
			<div class="box-tools">
				<div class="input-group input-group-sm" style="width: 150px;">
					<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

					<div class="input-group-btn">
						<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</div>
			 @endif
		</div>

		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding ">
			<table class="table table-hover">

				<tbody>

					<tr>
						<th> # </th>
						<th> Name </th>
						<th> Email </th>
						<th> role </th>
						<th> Date </th>
					</tr>

					<tr>
						@foreach($buyer as $key => $buyers)
						<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
						<td> {{ $buyers->name }} </td>
						<td><span class="text-muted"> </i> {{ $buyers->email }} </span> </td>
						<td> {{ $buyers->role }} </td>
						<td> {{ $buyers->created_at->diffForHumans() }} </span></td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
		<!-- /.box-body -->

@if (url()->current() == route('admin.buyer') )
<div class="box-footer clearfix">
  {{ $buyer->links() }} 
</div>
@endif


</div>
