@extends('layouts.admins')
@section('content')
<div id="successmessage"></div>
<div id="errormessage"></div>
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
		<div class="main-card mb-3 card">
			<div class="card-body"><h5 class="card-title">Farmer Details</h5>
				<table class="mb-0 table table-bordered">
					<tbody>
						<tr>
							<th scope="row"><b>Name</b></th>
							<td>{{$farmer->name}}</td>
						</tr>
						<tr>
							<th scope="row"><b>Location</b></th>
							<td>{{$farmer->location}}</td>
						</tr>
						<tr>
							<th scope="row"><b>Phone</b></th>
							<td>{{$farmer->phone}}</td>
						</tr>
						<tr>
							<th scope="row"><b>Farming Period</b></th>
							<td>{{$farmer->fperiod}} Years</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="main-card mb-3 card">
			<div class="card-body"><h5 class="card-title">Field Details</h5>
				<div class="table-responsive">
					<table class="mb-0 table">	
						<tbody>
							<tr>
								<tr>
									<th>Name</th>
									<td>{{$farmer->fieldname}}</td>
								</tr>
								<tr>
									<th>Farm Size</th>
									<td>{{$farmer->farmsize}} Acres</td>
								</tr>
								<tr>
									<th>Main Crop</th>
									<td><b>{{$farmer->fmaincrop}}</b></td>
								</tr>
								<tr>
									<th>Farm Blocks</th>
									<td>{{$farmer->farmblocksno}}</td>
								</tr>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<div class="main-card mb-3 card">
					<div class="card-body"><h5 class="card-title">Harvests</h5>
						<div class="table-responsive">
							<table class="mb-0 table" id="cropstable4">
								<thead>
									<tr>
										<th>#</th>
										<th>Date</th>
										<th>Crop</th>
										<th>Variety</th>
										<th>Quantity</th>
										<th>Unit</th>
										<th>Unit Price</th>
										<th>Amount</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($harvests as $harvest)
									<tr>
										<th scope="row">1</th>
										<td>{{$harvest->date}}</td>
										<td>Avocado</td>
										<td>{{$harvest->avocadovariety}}</td>
										<td>{{$harvest->totalquantity}}</td>
										<td>{{$harvest->unit}}</td>
										<td>{{$harvest->price}}</td>
										<td>{{$harvest->amount}}</td>
										<td>
											<div class="btn-group" role="group" aria-label="Button group with nested dropdown">

												<div class="btn-group" role="group">
													<button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Options
													</button>
													<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
														<a href="{{ route('admins.print', $harvest->id) }}" target="_blank" class="dropdown-item">Print</a>
														<a href="#" onclick="show_edit({{$harvest->id}})" class="dropdown-item">Edit</a>
														<a href="#" onclick="show_delete({{$harvest->id}})" class="dropdown-item">Delete</a>
													</div>
												</div>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
<!-- Modal 1 -->

<div class="modal fade" id="harvestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Register Harvest</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					@csrf
					<div class="row form-group" hidden>
						<label for="" class="col-md-5">Crop Id</label>
						<div class="col-md-7">
							<input type="number" class="form-control" id="crop_id"  name ="crop_id">
						</div>
					</div>
					<div class="row form-group" hidden>
						<label for="" class="col-md-5">Farmer Id</label>
						<div class="col-md-7">
							<input type="number" class="form-control" id="farmer_id"  name ="farmer_id" value="{{$farmer->id}}">
						</div>
					</div><div class="row form-group" hidden>
						<label for="" class="col-md-5">Farmer Name</label>
						<div class="col-md-7">
							<input type="text" class="form-control" id="farmer_name"  name ="farmer_name" value="{{$farmer->name}}">
						</div>
					</div><div class="row form-group" hidden>
						<label for="" class="col-md-5">Farmer Phone</label>
						<div class="col-md-7">
							<input type="text" class="form-control" id="farmer_phone"  name ="farmer_phone" value="{{$farmer->phone}}">
						</div>
					</div>
					<div class="row form-group">
						<label for="" class="col-md-5">Date Harvested</label>
						<div class="col-md-7">
							<input type="date" class="form-control" id="date"  name ="date">
						</div>
					</div>
					<div class="row form-group">
						<label for="" class="col-md-5">Unit</label>
						<div class="col-md-7">
							<select name="unit" id="unit" class="form-control">
								<option>Kgs</option>
								<option>Pcs</option>
							</select>
						</div>
					</div>
					<div class="row form-group">
						<label for="" class="col-md-5">Avocado Type</label>
						<div class="col-md-7">
							<select name="avocadovariety" id="avocadovariety" class="form-control">
								<option disabled="disabled" selected="true">Select One</option>
								<option>Hass</option>
								<option>Fuerte</option>
							</select>
						</div>
					</div>
					<div class="row form-group">
						<label for="" class="col-md-5">No. of Crates</label>
						<div class="col-md-7">
							<input type="number" class="form-control" id="crates"  name ="crates">
						</div>
					</div>
					<div class="row form-group">
						<label for="" class="col-md-5">Quantity(in Kgs)</label>
						<div class="col-md-7">
							<input type="number" class="form-control" id="quantity"  name ="quantity">
						</div>
					</div>
					<div class="row form-group" hidden>
						<label for="" class="col-md-5">Price/Kg</label>
						<div class="col-md-7">
							<input type="number" class="form-control" id="price"  name ="price" value="30">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" id="save_harvest" class="btn btn-flat btn-success"><i class="fa fa-check-circle"></i> Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal -->  
<!-- Modal 1 -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Harvest</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					@csrf
					<div class="row form-group">
						<label for="" class="col-md-5">Harvest Id</label>
						<div class="col-md-7">
							<input type="number" class="form-control" id="harvest_id"  name ="harvest_id">
						</div>
					</div>
					<div class="row form-group">
						<label for="" class="col-md-5">Date Harvested</label>
						<div class="col-md-7">
							<input type="date" class="form-control" id="harvest_date"  name ="date">
						</div>
					</div>
					<div class="row form-group">
						<label for="" class="col-md-5">Unit</label>
						<div class="col-md-7">
							<select name="unit" id="harvest_unit" class="form-control">
								<option>Kgs</option>
								<option>Pcs</option>
							</select>
						</div>
					</div>
					<div class="row form-group">
						<label for="" class="col-md-5">Avocado Type</label>
						<div class="col-md-7">
							<select name="avocadovariety" id="harvest_avocadovariety" class="form-control">
								<option disabled="disabled" selected="true">Select One</option>
								<option>Hass</option>
								<option>Fuerte</option>
							</select>
						</div>
					</div>
					<div class="row form-group">
						<label for="" class="col-md-5">No. of Crates</label>
						<div class="col-md-7">
							<input type="number" class="form-control" id="harvest_crates"  name ="crates">
						</div>
					</div>
					<div class="row form-group">
						<label for="" class="col-md-5">Quantity(in Kgs)</label>
						<div class="col-md-7">
							<input type="number" class="form-control" id="harvest_quantity"  name ="quantity">
						</div>
					</div>
					<div class="row form-group" hidden>
						<label for="" class="col-md-5">Price/Kg</label>
						<div class="col-md-7">
							<input type="number" class="form-control" id="harvest_price"  name ="price" value="30">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" id="save_harvest" class="btn btn-flat btn-success"><i class="fa fa-check-circle"></i> Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal --> 
<!-- Delete modal -->
<div class="modal fade" id="deleteModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Confirm</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-1">
							<i class="fa fa-2x fa-trash" aria-hidden="true"></i>
						</div>
						<div class="col-md-11">
							<p>Are you sure you want to delete this quote? Click Yes to delete</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-flat btn-success" data-dismiss="modal"> <i class="fa fa-check-circle"></i> Cancel</button>
					<div class="row form-group" hidden>
						<label for="" class="col-md-3">Harvest ID.</label>
						<div class="col-md-9">
							<input type="text" name="id" class="form-control" id="hid">
						</div>
					</div>
					<button type="button" id="footer_delete_action" data-dismiss="modal" class="btn btn-flat btn-danger"><i class="fas fa-ban"></i> Ok</button>
				{{-- </form> --}}
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@push('scripts')
<script>
	function show_crop(id) {
		// var id= $(this).val();
		$.ajax({
			url: '{{ url('previewcrop') }}' + '/' + id,
			type: 'GET',
			dataType: 'JSON',
			success: function(data){
			// alert(data.id);
			console.log(data);
			$('#crop_id').val(data.id);
		},
		error: function(error){
			alert('error')
		}
	});
	}

	function show_edit(id) {
		$.ajax({
			url: '{{ url('previewharvest') }}' + '/' + id,
			type: 'GET',
			dataType: 'JSON',
			success: function(data){
				$('#harvest_id').val(data.id);
				$('#harvest_date').val(data.date);
				$('#harvest_unit').val(data.unit);
				$('#harvest_avocadovariety').val(data.avocadovariety);
				$('#harvest_crates').val(data.crates);
				$('#harvest_quantity').val(data.quantity);
				$('#harvest_price').val(data.price);
				$('#editModal').modal('show');
      // $('#farmers_id').val(data.id);
  },
  error: function(error){
  	alert('error')
  }
});
	}
	$(document).on('click', '#save_harvest', function() {
		let id =  $('#harvest_id').val();
		 var c = $('#harvest_crates').val() * 1.8;
    let harvesttotalquantity = $('#harvest_quantity').val() - c;
    let harvestamount = harvesttotalquantity * $('#harvest_price').val();
		$.ajax({
			url: "{{ url('updateharvest') }}" + '/' + id,
			type: 'POST',
			dataType: 'JSON',
			 data: {
			 	'_token' : $('input[name = _token]').val(), 
        'id': $('#harvest_id').val(),
        'unit': $('#harvest_unit').val(),
        'quantity':  $('#harvest_quantity').val(),
        'totalquantity' : harvesttotalquantity,
        'date':  $('#harvest_date').val(),
        'avocadovariety':  $('#harvest_avocadovariety').val(),
        'crates':  $('#harvest_crates').val(),
        'price':  $('#harvest_price').val(),
        'amount': harvestamount,
      },
			success:function (response) {
				$('#successmessage').addClass('alert alert-success');
				$('#successmessage').text(response.success);
				$('#editModal').modal('hide');
				$("html, body").animate({ scrollTop: 0 }, "slow");
				return false;
			}
		})
	});

	function show_delete(id) {
		$.ajax({
			url: '{{ url('previewharvest') }}' + '/' + id,
			type: 'GET',
			dataType: 'JSON',
			success: function(data){
				$('#hid').val(data.id);
				$('#deleteModal').modal('show');
			},
			error: function(error){
				alert('error')
			}
		});
	}

	$(document).on('click', '#footer_delete_action', function() {
		let id =  $('#hid').val();
		$.ajax({
			url: "{{ url('deleteharvest') }}" + '/' + id,
			type: 'DELETE',
			dataType: 'JSON', 
			data: {
				'_token' : $('input[name = _token]').val(),      
			},success:function (response) {
				$('#successmessage').addClass('alert alert-success');
				$('#successmessage').text(response.success);
				$("#cropstable4").DataTable().ajax.reload();
				$("html, body").animate({ scrollTop: 0 }, "slow");
				return false;
			}
		})
	});
	$(document).on('click', '#save_harvest', function() {
		var c = $('#crates').val() * 1.8;
		let totalquantity = $('#quantity').val() - c;
		let amount = totalquantity * $('#price').val();
		let phone = parseInt($('#farmer_phone').val());
		$.ajax({
			url: "{{ url('/harvests') }}",
			type: 'post',
			dataType: 'JSON', 
			data: {
				'_token' : $('input[name = _token]').val(),
				'crop_id': $('#crop_id').val(),
				'farmer_id': $('#farmer_id').val(),
				'farmer_name': $('#farmer_name').val(),
				'farmer_phone': phone,
				'unit': $('#unit').val(),
				'quantity':  $('#quantity').val(),
				'totalquantity' : totalquantity,
				'date':  $('#date').val(),
				'avocadovariety':  $('#avocadovariety').val(),
				'crates':  $('#crates').val(),
				'price':  $('#price').val(),
				'amount': amount,
			},
			success:function(response){
				$('#successmessage').addClass('alert alert-success');
				$('#successmessage').text(response.success);
				$('#harvestModal').modal('hide')
				$("html, body").animate({ scrollTop: 0 }, "slow");
				return false;
			}
		});
	});
</script>
@endpush