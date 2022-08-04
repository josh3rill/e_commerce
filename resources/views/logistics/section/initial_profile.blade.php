<form class="form-element" method="POST" action="{{ route('logistic.profile.updates') }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	@method('PUT')
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="inputName" class="control-label">First Name</label>

				<div class="">
					<input type="text" id="name" class="form-control" name="first_name" value=" {{ Auth::guard('logistic')->user()->first_name }} ">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="inputName" class="control-label">Last Name</label>

				<div class="">
					<input type="text" id="name" class="form-control" name="last_name" value=" {{ Auth::guard('logistic')->user()->last_name }} ">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<img class="profile-user-img img-responsive" src="{{ Auth::guard('logistic')->user()->profile_image = null ? '/images/user-icon.png' : asset('uploads/users/'.Auth::guard('logistic')->user()->profile_image) }}" alt="User profile picture">
				<div class="custom-file text-center">
				  <input type="file" class="custom-file-input" id="customFile" name="profile_image" style="padding-left: 150px; display: none;" accept="image/*">
				  <label class="custom-file-label" for="customFile">Click to choose profile image/logo</label>
				</div>
			</div>
		</div>
		
	</div>
	<div class="row" style="padding-top: 10px;">
		<div class="col-md-4">
			<div class="form-group">
				<label for="inputEmail" class="control-label">Company</label>

				<div class="">
					<input type="type" class="form-control" name="company_name" value=" {{ Auth::guard('logistic')->user()->company_name }}">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="inputName" class="control-label">Email Address</label>

				<div class="">
					<input type="text" id="name" class="form-control" name="email" value=" {{ Auth::guard('logistic')->user()->email }} ">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="inputName" class="control-label">Phone</label>

				<div class="">
					<input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" class="form-control"  minlength="11" maxlength="11" name="phone" value="{{ Auth::guard('logistic')->user()->phone }}">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="inputName" class="control-label">State</label>

				<div class="">
					<select class="form-control" name="state_id">
						<option value="1">Abuja</option>
					</select>
				</div>
			</div>
		</div>
		
	</div>

	<div class="row">
		<div class="col-md-12">
			<label for="address">Address</label>

			<div class="">
				<input type="text" id="address" class="form-control" name="address" value=" {{ Auth::guard('logistic')->user()->address }} ">
			</div>
		</div>
	</div>
	
	<div class="row" style="padding-top: 20px; padding-bottom: 20px;">

		<div class="col-md-4 card">
			<div class="card-header">
				<h3 class="text text-warning">Means of Identification</h3>
			</div>
		</div>
		
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="bank_name" class="control-label">Identification Type <span style="color: red;">*</span></label>
				<div class="">
					<select class="form-control" name="identification_type">
						@if(Auth::guard('logistic')->user()->identification_type != '')
						<option value="{{ Auth::guard('logistic')->user()->identification_type }}">{{ Auth::guard('logistic')->user()->identification_type }}</option>
						@endif
						<option value="National ID">National ID</option>
						<option value="Voters Card">Voters Card</option>
						<option value="Drivers License">Drivers License</option>
						<option value="International Passport">International Passport</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="bank_name" class="control-label">Identification Number <span style="color: red;">*</span></label>
				<div class="">
					<input type="text" id="bank_name" class="form-control" name="identification_number" value="{{ Auth::guard('logistic')->user()->identification_id ? Auth::guard('logistic')->user()->identification_id : '' }}" placeholder="Enter the id number">
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				@if(Auth::guard('logistic')->user()->document != '')
				<label>Download</label>
				<br>
				<a href="{{ route('logistic.download.doc', Auth::guard('logistic')->user()->slug) }}" class="text text-danger">Click here to download</a>
					{{-- <button type="button" class="btn btn-default">Download CAC Document</button> --}}
					<br>
					or
					<br>
					<label>Upload</label>
					<div class="">
						<input type="file" id="bank_name" class="form-control" name="document">
					</div>
				@else
				<label for="bank_name" class="control-label">Upload Means of ID</label>
				<div class="">
					<input type="file" id="bank_name" class="form-control" name="document" accept="image/*">
				</div>
				@endif
				{{-- <label for="bank_name" class="control-label">BVN <span style="color: red;">*</span></label>
				<div class="">
					<input type="number" class="form-control" name="bvn" value="{{Auth::guard('logistic')->user()->bvn ? Auth::guard('logistic')->user()->bvn : '' }}" placeholder="Enter your bvn">
				</div> --}}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="bank_name" class="control-label">CAC? (optional)</label>
				<div class="">
					<select class="form-control" name="cac">
						<option value="{{ Auth::guard('logistic')->user()->cac }}">{{ (Auth::guard('logistic')->user()->cac) ? 'Yes' : 'No' }}</option>
						<option default>Do you have CAC documents?</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				@if(Auth::guard('logistic')->user()->cac_document != '')
				<label>Download</label>
				<br>
				<a href="{{ route('logistic.download.doc', Auth::guard('logistic')->user()->slug) }}" class="text text-danger">Click here to download</a>
					{{-- <button type="button" class="btn btn-default">Download CAC Document</button> --}}
					<br>
					or
					<br>
					<label>Upload</label>
					<div class="">
						<input type="file" id="bank_name" class="form-control" name="cac_document" accept="image/*">
					</div>
				@else
				<label for="bank_name" class="control-label">Upload CAC document</label>
				<div class="">
					<input type="file" id="bank_name" class="form-control" name="cac_document" accept="image/*">
				</div>
				@endif
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="bank_name" class="control-label">Type of Bike <span style="color: red;">*</span></label>
				<div class="">
					<input type="text" class="form-control" name="type_of_bike" value="{{ Auth::guard('logistic')->user()->type_of_bike }}" placeholder="Which kind of bike do you own?">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="bank_name" class="control-label">Bike Plate <span style="color: red;">*</span></label>
				<div class="">
					<input type="text" id="bank_name" class="form-control" name="plate_number" value="{{ Auth::guard('logistic')->user()->plate_number }}" placeholder="Enter the plate number of your bike">
				</div>
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-warning">Update <i class="fa fa-refresh"></i></button>
				</div>
			</div>
		</div>
	</div>

	
	

	



</form>