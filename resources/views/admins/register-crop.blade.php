@extends('layouts.admins')
@section('content')

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Select Field</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
		<div id="successmessage"></div>
		<div class="row">
			<div class="col-md-4">
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
						<label>ID</label>
						<input type="text" id="fid" class="form-control">
					</div>
					<!-- /.form-group -->
				</div>
				<!-- /.col -->
				<div class="col-md-4">
					<div class="form-group">
						<label>Field Name</label>
						<select name="fields" id="fields" class="form-control select2">
						</select>
					</div>
					<!-- /.form-group -->
				</div>
				<!-- /.col -->
				<div class="col-md-4">
					<div class="form-group">
						<label>Season of the Year</label>
						<select name="season" id="season" class="form-control select2">
							<option selected="true" disabled="disabled">Select One</option>
							<option value="Jan-June">First Part(Year)</option>
							<option value="July-December">Second Part(Year)</option>
							<option value="">No Season</option>
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
						<label>Date Planted</label>
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
						<input type="text" name="quantityplanted" id="quantityplanted" class="form-control">
					</div>
					<!-- /.form-group -->

					<div class="form-group">
						<label>Expected Volume (Kgs)</label>
						<input type="number" name="expectedvolume" id="expectedvolume" class="form-control">
					</div>
					<!-- /.form-group -->

					<div class="form-group">
						<label>Crop in Previous Season</label>
						<input type="text" name="previouscrop" id="previouscrop" class="form-control">
					</div>
					<!-- /.form-group -->
					<div class="form-group">
						<label>Expected Harvest date</label>
						<input type="date" name="expectedharvestdate" id="expectedharvestdate" class="form-control">
					</div>
					<!-- /.form-group -->

				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->	
			<div class="row" >
				<div class="col-md-12">

					<button type="button" id="register_crop" class="btn btn-success float-right">Submit</button>
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
			$('#fields').val('');
			// alert(data.id);
			// console.log(data.fields);
			$('#fid').val(data.id);
			$('#phone').val(data.phone);	
			$.each(data.fields, function (index, val) {
				$('#fields').append($('<option>', { 
					value: val.id,
					text : val.fieldname 
				}));
			});


},
error: function(error){
	alert('error')
}
})          
	});

	$(document).on('click', '#register_crop', function(){
		$.ajax({
			url: '{{ url('fields') }}',
			type: 'POST',
			dataType: 'JSON', 
			data: {
				'_token' : $('input[name = _token]').val(),
				'field_id': $('#fields').val(),
				'season' :$('#season').val(),
				'crop' :$('#crop').val(),
				'avocodvariety' :$('#avocodvariety').val(),
				'dateplanted' :$('#dateplanted').val(),
				'nooftrees' :$('#nooftrees').val(),
				'certifiedtrees' :$('#certifiedtrees').val(),
				'beansvariety' :$('#beansvariety').val(),
				'expectedharvestdate' :$('#expectedharvestdate').val(),
				'expectedvolume' :$('#expectedvolume').val(),
				'previouscrop' :$('#previouscrop').val(),
			},
			success:function(response){
				 if($.isEmptyObject(response.error)){
                  document.getElementById("cform").reset();
				$('#successmessage').addClass('alert alert-success');
				$('#successmessage').text(response.success);
				$("html, body").animate({ scrollTop: 0 }, "slow");
 				 return false;
                    }else{
                        printErrorMsg(response.error);
                        $("html, body").animate({ scrollTop: 0 }, "slow");
 				 return false;
                    }

			}
		})
	});

	 function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }

</script>
@endpush
