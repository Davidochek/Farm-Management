@extends('layouts.admins')
@section('content')

<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Orders</div>
                    <div class="widget-subheading"></div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>1896</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Farmers</div>
                    <div class="widget-subheading"></div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span> {{$farmers->count()}}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Fields</div>
                    <div class="widget-subheading"></div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>46</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class=" col-md-4">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                    Chart Style
                </div>
            </div>
            <div class="card-body">
                 {{-- <label>Select Chart Style</label>
             <select name="chart" onchange="myFunction()" class="form-control" id="chart" style="width:120px;">
                <option value="pie">Pie</option>
                <option value="column" selected>Column</option>
                <option value="pyramid">Pyramid</option>
                <option value="bar">Bar</option>
            </select> --}}
               <div class="row">
         <div class="col-md-5">
             <label>Select Chart Style</label>
         </div>
         <div class="col-md-7" >
             <select name="chart" onchange="myFunction()" class="form-control" id="chart" style="width:120px;">
                <option value="pie">Pie</option>
                <option value="column" selected>Column</option>
                <option value="pyramid">Pyramid</option>
                <option value="bar">Bar</option>
            </select>
        </div>
    </div>
           </div>
       </div>
   </div>
   <div class=" col-md-8">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                    Chart
                </div>
            </div>
            <div class="card-body">
               {{-- <canvas id="canvas" height="280" width="600"></canvas> --}}
               <div id="chartContainer" style="height: 370px; width: 100%;"></div>
           </div>
       </div>
   </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Registered Farmers
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-center">Location</th>
                            <th class="text-center">Farming Period</th>
                            <th class="text-center">No. Fields</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($farmers as $farmer)
                       <tr>
                           <td>{{$farmer->id}}</td>
                           <td>{{$farmer->name}}</td>
                           <td>{{$farmer->location}}</td>
                           <td>{{$farmer->fperiod}}</td>
                           <td>2</td>
                           <td><a href="{{ route('admins.farmerdetails',$farmer->id) }}" class="btn btn-success">Details</a></td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>
   </div>
</div>

@endsection
@push('scripts')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
 $(document).ready(function($) {
  var chartType = document.getElementById("chart").value;

  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title: {
        text: "Expected Crops Harvest"
    },
    subtitles: [{
        text: "Harvest in KGs"
    }],
    data: [{
        type:chartType, //"column",  type: "pie",
        yValueFormatString: "#,##0.\"\"",
        indexLabel: "{label} ({y})",
        dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
    }]
});
  chart.render(); 
});

 function myFunction() 
 {
  var chartType = document.getElementById("chart").value;

  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title: {
        text: "Expected Crops Harvest"
    },
    subtitles: [{
        text: "Harvest in KGs"
    }],
    data: [{
        type:chartType, //"column",  type: "pie",
        yValueFormatString: "#,##0.\"\"",
        indexLabel: "{label} ({y})",
        dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
    }]
});
  chart.render();
}

// window.onload = function() {


// }
</script>
@endpush