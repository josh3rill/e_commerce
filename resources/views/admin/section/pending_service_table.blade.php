
<div class="container">


	<!-- Content Header (Page header) -->
	<section class="content-header p-3 box">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Service </a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>


  @include('layouts.backend_partials.status')


	<div class="box">

		<div class="box-header">
			<h3 class="box-title"> Pending Service Table</h3>

			<div class="box-tools">
				<form class="" method="GET" action="{{ route('admin.service.search') }}">
				<div class="input-group input-group-sm" style="width: 150px;">
					<input type="search" class="form-control pull-right" placeholder="Search" name="query"  value="{{ isset($query) ? $query : '' }}" required>

					<div class="input-group-btn">
						<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover">

				<tbody>

					<tr>
						<th> # </th>
						<th> Name </th>
						<th> Experienced </th>
						<th> is_featured </th>
						<th> Address </th>
						<th> Status </th>
						<th> Date </th>
						<th> Action </th>
					</tr>

					<tr>
						@foreach($pending_service as $key => $pending_services)
						<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
						<td> {{ $pending_services->name }} </td>
						<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $pending_services->experience }} </span> </td>
						<td> {{ $pending_services->is_featured == 1 ? 'Yes' : 'No' }} </td>
						<td><span class="text-muted"> {{ $pending_services->streetAddress }} </span> </td>
						<td><span class="text-muted"> {{ $pending_services->status == 1 ? 'Approved' : 'Pending' }} </span> </td>
						<td><span class="text-muted"> {{ $pending_services->created_at->format('d/m/Y') }} </span></td>


						@if (url()->current() == route('admin.service.pending') )
						<td>

							<div class="btn-group">
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu" role="menu">

									<!-- Edit -->
									<form method="post" class="update_form" action=" {{ route('admin.service.status',$pending_services->id) }} ">
										@method('PATCH')
										@csrf
										<li>  <button class="btn btn-block" type="submit" style="margin-left: 8px;"> Activate </button> </li>
									</form>


									<!-- Delete -->
									<form method="post" class="delete_form" action=" {{ route('admin.service.destroy',$pending_services->id) }} ">
										@method('DELETE')
										@csrf
										<li>  <button class="btn btn-block" type="submit" style="margin-left: 8px;"> Delete </button> </li>
									</form>

								</ul>

							</ul>
						</div>
					</td>
					@endif

				</tr>
				@endforeach

			</tbody>
		</table>
	</div>
	<!-- /.box-body -->
</div>


<div class="box-footer clearfix">

	{{ $pending_service->links() }}

</div>



</div>
