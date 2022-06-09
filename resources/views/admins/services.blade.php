@extends('layouts.admins')
@section('content')

<style>
	 .card-body {
    flex: 1 1 auto;
    padding: 1.25rem;
  }
  .card-header, .card-title {
    text-transform: uppercase;
    color: rgba(13,27,62,0.7);
    font-weight: bold;
    font-size: .88rem;
  }
  .btn {
    position: relative;
    transition: color 0.15s,background-color 0.15s,border-color 0.15s,box-shadow 0.15s;
    font-size: .8rem;
  }
</style>

<div class="row">
  <div class="col-md-6 col-xl-4">
   <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">CROP HARVESTS REPORTS</h5>
        All the reports for the harvesting<br>
      <a href="{{ route('admins.harvest-reports') }}" class="btn btn-success">View Reports</a>
    </div>
      </div>
</div>   
<div class="col-md-6 col-xl-4">
 <div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">SERVICES REPORTS</h5>
      Farmer services request <br>
    <a href="{{ route('admins.services-report') }}" class="btn btn-success">View Requests</a>
  </div>
  </div>
</div>   
<div class="col-md-6 col-xl-4">
 <div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Register Services</h5>
    Create or add extension services for the farmers  <br>
    <a href="{{ route('admins.register-services') }}" class="btn btn-success">Add Services</a>
  </div>
  </div>
</div>  
</div>
@endsection

