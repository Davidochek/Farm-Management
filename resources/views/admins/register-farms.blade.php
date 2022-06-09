@extends('layouts.admins')
@section('content')

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Register Field</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div id="successmessage"></div>
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
				<form action="" id="cform">
				<div class="form-group">
					<label>Select Farmer</label>
					<select type="text" name="name" id="select2" class="form-control select2" required>
						<option disabled="disabled" selected="true">Select one</option>
						@foreach ($farmers as $farmer)
						<option value="{{$farmer->id}}">{{$farmer->name}}</option>
						@endforeach
					</select>


				</div>
				<!-- /.form-group -->
				<div class="form-group" hidden>
					<label>Select Farmer</label>
					<input type="text" id="fid" class="form-control">
				</div>
				<!-- /.form-group -->
			</div>
			<!-- /.col -->
			<div class="col-md-6">
				<div class="form-group">
					<label>Telephone</label>
					<input type="text" name="phone" id="phone" class="form-control" required>
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
		<h3 class="card-title">Register Field</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Field Name</label>
					<input type="text" class="form-control" id="fieldname" id="fieldname">			
				</div>
				<!-- /.form-group -->
				<div class="form-group">
					<label>Size</label>
					<select class="form-control select2" name="farmsize" id="farmsize" style="width: 100%;">
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
			</div>
			<!-- /.col -->
			<div class="col-md-6">
				<div class="form-group">
					<label>Main Crop</label>
					<select class="form-control select2" type="text" name="fmaincrop" id="fmaincrop">
						<option selected="true" disabled="disabled">Select one</option> 
						<option value="Avocado">Avocado</option>
						<option value="Beans">Beans</option>
					</select>
				</div>
				<!-- /.form-group -->
				<div class="form-group">
					<label>Which Other Crop</label>
					<input type="text" name="fothercrop" id="fothercrop" class="form-control">
				</div>

			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->	
		<div class="row" >
			<div class="col-md-12">
				
                      <button type="button" id="update_field" class="btn btn-success float-right">Submit</button>
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
$('#select2').change(function(){
  var id= $(this).val();
  $.ajax({
		url: '{{ url('admin/previewfarmer') }}' + '/' + id,
		type: 'GET',
		dataType: 'JSON',
		success: function(data){
			// alert(data.id);
			// console.log(data.phone);
			$('#fid').val(data.id);
			$('#phone').val(data.phone);
			$('#fmaincrop').val(data.fmaincrop);
		},
  error: function(error){
   alert('error')
 }
	})          
});

$(document).on('click', '#update_field', function($id){
	let id = $('#fid').val();
	  $.ajax({
		url: '{{ url('updatefarmer') }}' + '/' + id,
		type: 'PUT',
    	dataType: 'JSON', 
    	data: {
      '_token' : $('input[name = _token]').val(),
      'id': id,
'farmsize' :$('#farmsize').val(),
'fieldname' :$('#fieldname').val(),
'fmaincrop' :$('#fmaincrop').val(),
'fothercrop' :$('#fothercrop').val(),
		},
		success:function(response){
			document.getElementById("cform").reset();
			$('#successmessage').addClass('alert alert-success');
			$('#successmessage').text(response.success);
			$("html, body").animate({ scrollTop: 0 }, "slow");
 				 return false;
		}
	})
});

</script>
@endpush
