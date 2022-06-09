@extends('layouts.admins')
@section('content')

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Register Farmer</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
			@if ($errors->any())
	<div class="alert alert-dismissible alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
		<strong>Whoops!</strong> There was a problem with you input. <br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@elseif($message = Session::get('success'))
	<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
		<p>{{$message}}</p>
	</div>
@endif
		<div class="row">
			<div class="col-md-6">

				<form action="{{ route('farmers.store') }}" method="POST">
					@csrf
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control">
				</div>
				<!-- /.form-group -->
				<div class="form-group clearfix">
					<label>Gender</label>
					<div class="form-check">
						<input class="form-check-input" type="radio" value="Male" name="gender" id="gender1"> &nbsp;&nbsp;&nbsp;
						<label class="form-check-label" for="gender1">
							Male
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" value="Female" name="gender" id="gender2"> &nbsp;&nbsp;&nbsp;
						<label class="form-check-label" for="gender2">
							Female
						</label>
					</div>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label>Age Bracket</label>
					<select class="form-control select2" name="age" style="width: 100%;">
						<option selected="true" disabled="disabled">Select one</option> 
						<option value="18-19">18-29</option>
						<option value="30-39">30-39</option>
						<option value="40-49">40-49</option>
						<option value="50-59">50-59</option>
						<option value="60-69">60-69</option>
						<option value="70-79">70-79</option>
						<option value="80-89">80-89</option>
						<option value="90-99">90 and Above</option>
					</select>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label>Education</label>
					<select class="form-control select2" name="education" style="width: 100%;">
						<option selected="true" disabled="disabled">Select one</option> 
						<option>Primary Class 1-4</option>
						<option>Primary Class 5-8</option>
						<option>Form 1-2</option>
						<option>Form 2-4</option>
						<option>Artisan Course</option>
						<option>College</option>
						<option>University</option>
						<option>Masters</option>
					</select>
				</div>
				<!-- /.form-group -->
			</div>
			<!-- /.col -->
			<div class="col-md-6">
				<div class="form-group">
					<label>Telephone</label>
					<input type="text" name="phone" class="form-control">
				</div>
				<!-- /.form-group -->
				<div class="form-group">
					<label>Village/Locatiom</label>
					<input type="text" name="location" class="form-control">
				</div>
				<!-- /.form-group -->
				<div class="form-group">
					<label>How Long Farming</label>
					<select class="form-control select2" name="fperiod" style="width: 100%;">
						<option selected="true" disabled="disabled">Select one</option> 
						<option value="0-3">0-3 Years</option>
						<option value="3-4">3-4 Years</option>
						<option value="5-8">5-8 Years</option>
						<option value="9-13">9-13 Years</option>
						<option value="13-20">Above 13 Years</option>
					</select>
				</div>
				<!-- /.form-group -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->		
	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Farm Details</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Size</label>
					<select class="form-control select2" name="farmsize" style="width: 100%;">
						<option selected="true" disabled="disabled">Select one</option> 
						<option value="0-2">0-2 acres</option>
						<option value="3-5">3-5 acres</option>
						<option value="6-10 ">6-10 acres</option>
						<option value="11-15">11-15 acres</option>
						<option value="16-20">16-20 acres</option>
						<option value="21-30">21-30 acres</option>
						<option value="30-100 ">Over 30 acres</option>
					</select>
				</div>
				<!-- /.form-group -->
				<div class="form-group clearfix">
					<label>Homestead Included</label>
					<div class="form-check">
						<input class="form-check-input" type="radio" value="Yes" name="fwithhomestead" id="fwithhomestead1"> &nbsp;&nbsp;&nbsp;
						<label class="form-check-label" for="fwithhomestead1">
							Yes
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" value="No" name="fwithhomestead" id="fwithhomestead2"> &nbsp;&nbsp;&nbsp;
						<label class="form-check-label" for="fwithhomestead2">
							No
						</label>
					</div>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label>What Animals</label>
					<select class="form-control select2" name="farmanimals" style="width: 100%;">
						<option selected="true" disabled="disabled">Select one</option> 
						<option>Dairy Cows</option>
						<option>Goats</option>
						<option>Beef Cattle</option>
						<option>Other</option>
					</select>
				</div>
				<!-- /.form-group -->
				<div class="form-group clearfix">
					<label>Farm Blocks</label>
					<div class="form-check">
						<input class="form-check-input" type="radio" value="Yes" name="farmblocks" id="farmblocks1"> &nbsp;&nbsp;&nbsp;
						<label class="form-check-label" for="farmblocks1">
							Yes
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" value="No" name="farmblocks" id="farmblocks2"> &nbsp;&nbsp;&nbsp;
						<label class="form-check-label" for="farmblocks2">
							No
						</label>
					</div>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label>Farm Fields</label>
					<select class="form-control select2" name="farmblocksno" style="width: 100%;">
						<option selected="true" disabled="disabled">Select one</option> 
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
					</select>
				</div>
				<!-- /.form-group -->
				<div class="form-group clearfix">
					<label>Certifications</label>
					<div class="form-check">
						<input class="form-check-input" type="radio" value="Yes"  name="farmcertifications" id="farmcertifications1"> &nbsp;&nbsp;&nbsp;
						<label class="form-check-label" for="farmcertifications1">
							Yes
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" value="No" value="No" name="farmcertifications" id="farmcertifications2"> &nbsp;&nbsp;&nbsp;
						<label class="form-check-label" for="farmcertifications2">
							No
						</label>
					</div>
				</div>
				<!-- /.form-group -->

			</div>
			<!-- /.col -->
			<div class="col-md-6">
				<div class="form-group">
					<label>Farm Ownership</label>
					<select class="form-control select2" name="farmownership" style="width: 100%;">
						<option selected="true" disabled="disabled">Select one</option> 
						<option>Family</option>
						<option>Spouse</option>
						<option>Parents</option>
						<option>Lease</option>
					</select>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label>Animals on the Farm</label>
					<select type="text" name="farmanimalsno" class="form-control select2">
						<option selected="true" disabled="disabled">Select one</option> 
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</div>
				<!-- /.form-group -->
				<div class="form-group">
					<label>Means of Transport</label>
					<select class="form-control select2" name="farmtransport" style="width: 100%;">
						<option selected="true" disabled="disabled">Select one</option> 
						<option value="Foot">Foot</option>
						<option value="Bicycle">Bicycle</option>
						<option value="Motocycle">Motocycle</option>
						<option value="Vehicles">Vehicles</option>
						<option value="Pickup">Pickup</option>
					</select>
				</div>
				<!-- /.form-group -->
				<div class="form-group">
					<label>Main Crop</label>
					<select class="form-control select2" type="text" name="fmaincrop">
						<option selected="true" disabled="disabled">Select one</option> 
						<option value="Avocado">Avocado</option>
						<option value="Beans">Beans</option>
					</select>
				</div>
				<!-- /.form-group -->
				<div class="form-group">
					<label>Which Other Crop</label>
					<input type="text" name="fothercrop" class="form-control">
				</div>

			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->	
		<div class="row" >
			<div class="col-md-12">
				
                      <button type="submit" class="btn btn-success float-right">Submit</button>
	</form>
			</div>
		</div>	
	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->


@endsection
