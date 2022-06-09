@extends('layouts.admins')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Harvest Reports</h5>
        Generate Report <br>
		<form action="{{ route('admins.pdfreport') }}" method="POST">
						{{csrf_field()}}
						<div class="form-group"><label for="from_date">From Date</label><input class="form-control" name="from_date" type="date" required></div>
						<div class="form-group"><label for="to_date">To Date</label><input class="form-control" name="to_date" type="date" required></div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="pdf" checked>
							<label class="form-check-label" for="exampleRadios1">
								&nbsp;&nbsp;&nbsp;&nbsp;Pdf
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="excel">
							<label class="form-check-label" for="exampleRadios2">
								&nbsp;&nbsp;&nbsp;&nbsp;Excel
							</label>
						</div>
						<div class="form-group"><input class="btn btn-sm btn-flat btn-success float-right" type="submit" value="Generate Report"></div>
					</form>
				</div>
			</div>
	</div>
</div>
@endsection