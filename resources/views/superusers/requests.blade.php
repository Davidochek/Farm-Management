@extends('layouts.superusers')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body"><h5 class="card-title">Farmer Service Requests</h5>
				<table id="example1" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<td>No.</td>
							<th>Service</th>
							<th>Details</th>
							<th>Date Expected</th>
							<th>Farmer</th>
							<th>Contact</th>
							<th>Farmer Location</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$index =0;
						?>
						@foreach ($orders as $index=>$order)
						<tr>
							<td>{{++$index}}</td>
							<td>{{$order->sname}}</td>
							<td>{{$order->sdetails}}</td>
							<td>{{$order->date}}</td>
							<td>{{$order->fname}}</td>
							<th>{{$order->fphone}}</th>
							<th>{{$order->flocation}}</th>
						</tr>
						@endforeach
					</tfoot>
				</table>

			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
		$('#example1').DataTable();
	} );
</script>
@endpush