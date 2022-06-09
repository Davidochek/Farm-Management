@extends('layouts.admins')
@section('content')



<div class="row">
  <div class="col-md-12">
    <div class="main-card mb-3 card">
      <div class="card-header">Registered Harvest
      </div>
      <div class="table-responsive">
        <table  class="mb-0 table" id="cropstable1">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Farmer</th>
              <th class="text-center">Field</th>
              <th class="text-center">Crop</th>
              <th class="text-center">Weight(Kgs)</th>
              <th class="text-center">Price</th>
              <th class="text-center">Amount</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0;
            ?>
            @foreach ($harvests as $harvest)
            {{-- {{$harvest->fieldname}} --}}
            @foreach ($harvest->crops as $crop)
            {{--  {{$crop->crop}} --}}
            @foreach ($crop->harvests as $received)
            <?php
            $i++
            ?>
            <tr>
              <td>{{$i}}</td>
             <td>{{$received->farmer_name}}</td>
             <td>{{$harvest->fieldname}}</td>
             <td>{{$crop->crop}}</td>
             <td>{{$received->totalquantity}}</td>
             <td>{{$received->price}}</td>
             <td>{{$received->amount}}</td>
             <td><a href="{{ route('admins.print2', $received->id) }}" target="_blank" class="btn btn-success">Print</a></td>
           </tr>
           @endforeach
           @endforeach
           @endforeach
         </tbody>
       </table>
     </div>
   </div>
 </div>
</div>

@endsection
@push('scripts')
@endpush