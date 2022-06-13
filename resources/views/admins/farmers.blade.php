@extends('layouts.admins')
@section('content')
<div id="successmessage"></div>
<div id="errormessage"></div>

<div class="row">
  <div class="col-md-2">
    <div class="app-sidebar__inner">
    <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading"><a href="#" style="color: #57B157 !important; text-transform: none; padding-left: 0px;">Harvesting</a></li> 
                                <li class="app-sidebar__heading"><a href="#" style="color: #57B157 !important; text-transform: none; padding-left: 0px;">Nyota Beans</a></li> 
                                <li class="app-sidebar__heading"><a href="#" style="color: #57B157 !important; text-transform: none; padding-left: 0px;">Soil Testing</a></li> 
                                <li class="app-sidebar__heading"><a href="#" style="color: #57B157 !important; text-transform: none; padding-left: 0px;">Pruning Shears</a>
                                </li>
                                <li class="app-sidebar__heading"><a href="#" style="color: #57B157 !important; text-transform: none; padding-left: 0px;">Harvesting Secateurs </a>
                                </li>
                                <li class="app-sidebar__heading"><a href="#" style="color: #57B157 !important; text-transform: none; padding-left: 0px;">FCM Traps </a>
                                </li>
                                <li class="app-sidebar__heading"><a href="#" style="color: #57B157 !important; text-transform: none; padding-left: 0px;">Fruit Fly Traps</a>
                                </li>
                               
                              </ul>
                            </div>
  </div>
  <div class="col-md-10">
    <div class="main-card mb-3 card">
      <div class="card-header">Registered Fields For Harvesting
      </div>
      <div class="table-responsive">
        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th>Name</th>
              <th class="text-center">Farmer</th>
              <th class="text-center">Phone</th>
              <th class="text-center">Location</th>
              <th class="text-center">No. Fields</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0
            ?>
            @foreach ($farmers as $farmer)
            <?php
            $i++
            ?>
            <tr>
             <td>{{$i}}</td>
             <td>{{$farmer->fieldname}}</td>
             <td>{{$farmer->name}}</td>
             <td>{{$farmer->phone}}</td>
             <td>{{$farmer->location}}</td>
             <td>{{$farmer->farmblocksno}}</td>
             <td>
              <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                <div class="btn-group" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Options
                  </button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a href="{{ route('admins.farmerdetails',$farmer->id) }}" class="dropdown-item">View Details</a>
                    <a href="#" onclick="show_crop({{$farmer->id}})" class="dropdown-item">Harvest</a>
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
            <label for="" class="col-md-5">Farmer Id</label>
            <div class="col-md-7">
              <input type="number" class="form-control" id="farmers_id"  name ="farmers_id">
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

@push('scripts')
<script>
  function show_crop(id) {
    // var id= $(this).val();
    $.ajax({
      url: '{{ url('previewfield') }}' + '/' + id,
      type: 'GET',
      dataType: 'JSON',
      success: function(data){
      // alert(data.id);
      //console.log(data);
      $('#harvestModal').modal('show');
      $('#farmers_id').val(data.id);
    },
    error: function(error){
      alert('error')
    }
  });
  }

  $(document).on('click', '#save_harvest', function() {
    var c = $('#crates').val() * 1.8;
    let totalquantity = $('#quantity').val() - c;
    let amount = totalquantity * $('#price').val();
    $.ajax({
      url: "{{ url('/harvests') }}",
      type: 'post',
      dataType: 'JSON', 
      data: {
        '_token' : $('input[name = _token]').val(),
        'farmers_id': $('#farmers_id').val(),
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
        if (response.success) {
          $('#successmessage').addClass('alert alert-success');
          $('#successmessage').text(response.success);
          $('#harvestModal').modal('hide');
          $("html, body").animate({ scrollTop: 0 }, "slow");
          return false;          
        }else{
          $('#errormessage').addClass('alert alert-danger');
          $('#errormessage').text(response.error);
          $('#harvestModal').modal('hide');
          $("html, body").animate({ scrollTop: 0 }, "slow");
          return false;   
        }
      }
    });
  });
</script>
@endpush