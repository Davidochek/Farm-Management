@extends('layouts.admin')
@section('content')
<div class="section-title-01 honmob">
	<div class="bg_parallax image_01_parallax"></div>
	<div class="opacy_bg_02">
		<div class="container">
			<h1>{{$pestdetails->name}} Pesticides</h1>
		</div>
	</div>
</div>
<section class="content-central">
	<div class="semiboxshadow text-center">
		<img src="img/img-theme/shp.png" class="img-responsive" alt="">
	</div>
	<div class="content_info">
		<div class="paddings-mini">
			<div class="container">
				<div class="row">
					<div class="col-md-12 single-blog">
						<div class="post-item">
							<div class="row">
								
								<div class="col-md-12">
									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<td>No.</td>
												<th>Name</th>
												<th>Reg. No.</th>
												<th>Agent</th>
												<th>Uses</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$index =0;
											?>
											@foreach ($pesticides->pesticides as $key=> $pesticide)
											@if ($pesticide->attack == $pestdetails->name)
												<tr>
													<td>{{++$index}}</td>
												<td>{{$pesticide->name}}</td>
												<td>{{$pesticide->reg_no}}</td>
												<td>{{$pesticide->agent}}</td>
												<td>{{$pesticide->uses}}</td>
											</tr>
											@endif
											@endforeach
										</tfoot>
									</table>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>            
</section>


@endsection
@push('scripts')
<script>
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>
@endpush