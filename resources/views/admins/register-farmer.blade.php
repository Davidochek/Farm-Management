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
					<div class="form-group">
						<label>ID No.</label>
						<input type="number" name="idno" class="form-control">
					</div>
					<!-- /.form-group -->

					<div class="form-group">
						<label>Coordinator</label>
						<select class="form-control select2" name="coordinator" style="width: 100%;">
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
						<label>GPS Location</label>
						<input type="text" name="gps" class="form-control">
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
	<div class="card card-default">
		<div class="card-header">
			<h3 class="card-title">Farm Details</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Field Name</label>
						<input type="text" class="form-control" name="fieldname" id="fieldname">			
					</div>
					<!-- /.form-group -->
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
				</div>
				<!-- /.col -->
				<div class="col-md-6">
					<div class="form-group">
						<label>Main Crop</label>
						<input type="text" name="fmaincrop" id="fmaincrop" class="form-control">
					</div>
					<!-- /.form-group -->
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
			<h3 class="card-title">Register Crop Season</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Crop</label>
						<select class="form-control select2" name="crop" id="crop" style="width: 100%;">
							<option selected="true" disabled="disabled">Select one</option> 
							<option value="Avocado">Avocado</option>
							<option value="Beans">Beans</option>
						</select>
					</div>
					<!-- /.form-group -->
					<div class="form-group">
						<label>Avocado Variety</label>
						<select type="text" name="avocodvariety" id="avocodvariety" class="form-control select2">
							<option selected="true" disabled="disabled">Select one</option> 
							<option value="Hass">Hass</option>
							<option value="Fuerte">Fuerte</option>
							<option value="Both">Both</option>
						</select>
					</div>

					<div class="form-group">
						<label>Number of Trees</label>
						<input type="number" name="nooftrees" id="nooftrees" class="form-control">
					</div>
					<!-- /.form-group -->
					<div class="form-group">
						<label>Certified Trees</label>
						<input type="number" name="certifiedtrees" id="certifiedtrees" class="form-control">
					</div>
					<!-- /.form-group -->
					<div class="form-group">
						<label>Date Planted(Avocado)</label>
						<input type="date" name="dateplanted" id="dateplanted" class="form-control">
					</div>
					<!-- /.form-group -->


				</div>
				<!-- /.col -->
				<div class="col-md-6">
					<div class="form-group">
						<label>Beans Variety</label>
						<input type="text" name="beansvariety" id="beansvariety" class="form-control">
					</div>
					<div class="form-group">
						<label>Quantity Planted(Beans)</label>
						<input type="number" name="quantityplanted" id="quantityplanted" class="form-control">
					</div>
					<!-- /.form-group -->

					<div class="form-group">
						<label>Beans Expected Volume(Kgs)</label>
						<input type="number" name="expectedvolume" id="expectedvolume" class="form-control">
					</div>
					<!-- /.form-group -->
					<div class="form-group">
						<label>Expected Harvest date(Beans)</label>
						<input type="date" name="expectedharvestdate" id="expectedharvestdate" class="form-control">
					</div>
					<!-- /.form-group -->

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
@push('scripts')
	<script>
		$(function () {
            $("#crop").change(function () {
                if ($(this).val() == "Beans") {
                    $("#beansvariety").removeAttr("disabled");
                      $("#quantityplanted").removeAttr("disabled");
                      $("#expectedvolume").removeAttr("disabled");
                       $("#previouscrop").removeAttr("disabled");
                        $("#expectedharvestdate").removeAttr("disabled");
                    $("#beansvariety").focus();
                     $("#quantityplanted").focus();
                      $("#expectedvolume").focus();
                        $("#previouscrop").focus();
                         $("#expectedharvestdate").focus();
                } else {
                    $("#beansvariety").attr("disabled", "disabled");
                    $("#quantityplanted").attr("disabled", "disabled");
                     $("#expectedvolume").attr("disabled", "disabled");
                      $("#previouscrop").attr("disabled", "disabled");
                       $("#expectedharvestdate").attr("disabled", "disabled");
                }
            });
            $("#crop").change(function () {
                if ($(this).val() == "Avocado") {
                    $("#avocodvariety").removeAttr("disabled");
                      $("#nooftrees").removeAttr("disabled");
                      $("#certifiedtrees").removeAttr("disabled");
                       $("#dateplanted").removeAttr("disabled");          
                    $("#avocodvariety").focus();
                     $("#nooftrees").focus();
                      $("#certifiedtrees").focus();
                        $("#dateplanted").focus();      
                } else {
                    $("#avocodvariety").attr("disabled", "disabled");
                    $("#nooftrees").attr("disabled", "disabled");
                     $("#certifiedtrees").attr("disabled", "disabled");
                      $("#dateplanted").attr("disabled", "disabled");
                }
            });
        });
	</script>
@endpush
