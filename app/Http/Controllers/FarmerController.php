<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\Crop;
use App\Models\Farmer;
use App\Models\Field;
use App\Models\Harvest;
use App\Models\Order;
use DB;
use Illuminate\Http\Request;
use PDF;
use Barryvdh\Snappy;
use PdfReport;
use ExcelReport;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function registerfarms()
    {
        $farmers = Farmer::all();
        return view('admins.register-farms', compact('farmers'));

    }

    public function registercrops()
    {
        $farmers = Farmer::with('fields')->get();
        return view('admins.register-crop', compact('farmers'));

    }

    public function previewfarmer($id)
    {
        $farmer = Farmer::with('fields')->find($id);
        return $farmer;

    }

    public function farmerdetails($id)
    {
        $farmer = Farmer::with('fields')->find($id);
        $fields = Field::where('farmer_id', $id)->with('crops')->latest()->get();
        $harvests = Harvest::where('farmer_id', $id)->with('crops')->latest()->get();
        return view('admins.farmer-details', compact(['farmer', 'fields', 'harvests']));

    }

    public function print($id)
    {
        $harvest = Harvest::findOrFail($id);
        $pdf = PDF::loadView('admins.receipt', compact('harvest'));
        return $pdf->stream('delivery.pdf');
    }

    public function print2($id)
    {
        $harvest = Harvest::with('fields')->findOrFail($id);
        // return view('admins.receipt_2', compact('harvest'));
        $pdf = PDF::loadView('admins.receipt_2', compact('harvest'));
        return $pdf->stream('delivery.pdf');
    }

    public function pdfreport(Request $request)
    {
        // return $request->all();
        $fromDate = $request['from_date'];
        $toDate = $request['to_date'];
        $type = $request['exampleRadios'];

        $title = 'iGrowers Harvest Reports'; // Report title

    $meta = [ // For displaying filters description on header
    'Registered on' => $fromDate . ' To ' . $toDate
];
$harvests = Harvest::select('id', 'date', 'unit', 'crop_id', 'farmer_id', 'farmer_name', 'farmer_phone', 'quantity','totalquantity', 'avocadovariety', 'crates', 'price', 'amount')->whereBetween('created_at', [$fromDate, $toDate]);
$columns = [
    'Farmer ID' => 'id',
    'Farmer Name' => 'farmer_name',
    'Phone No.' => 'farmer_phone',
    'Date' => 'date',
    'Unit' => 'unit',
    'Crop Planted' => 'id',
    'Variety' => 'avocadovariety',
    'No. of Crates' => 'crates',
    'Weight(Kgs)' => 'totalquantity',
    'Unit Price' => 'price',
    'Amount' => 'amount',
];
if ($type === "pdf") {
  return PdfReport::of($title, $meta, $harvests, $columns)
  ->editColumn('Phone No.', [
    'displayAs' => function($result) {
        return ('254'.$result->farmer_phone);
    }
])
  ->editColumn('Crop Planted', [
    'displayAs' => function($result) {
        return ('Avocado');
    }
])
                    ->showTotal([ // Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
                        'Weight(Kgs)' => 'point',
                        'Amount' => 'Ksh',
                        'Amount' => 'point',
                         // if you want to show dollar sign ($) then use 'Total Balance' => '$'
                    ])
                    ->limit(10000) // Limit record to be showed
                    ->stream(); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
                }else 
                {
                  return ExcelReport::of($title, $meta, $harvests, $columns)
                  ->editColumn('Phone No.', [
                    'displayAs' => function($result) {
                        return ('254'.$result->farmer_phone);
                    },
                    'class' => 'left'
                ])
                  ->editColumn('Crop Planted', [
                    'displayAs' => function($result) {
                        return ('Avocado');
                    }
                ])
                    ->showTotal([ // Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
                        'Weight(Kgs)' => 'point',
                        'Amount' => 'Ksh',
                        'Amount' => 'point',
                         // if you want to show dollar sign ($) then use 'Total Balance' => '$'
                    ])
                    ->limit(10000) // Limit record to be showed
                    ->download('iGrowers Harvests Report'); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
                }

            }


            public function viewharvest()
            {
                $harvests = Field::with('harvests')->latest()->get();
                return view('admins.view-harvest', compact('harvests'));

            }
            public function harvestreports()
            {
                /*$harvests = Field::with('harvests')->get();*/
                return view('admins.harvest-reports');

            }
            public function servicesreports()
            {
                /*$harvests = Field::with('harvests')->get();*/
                $services = Services::latest()->get();
                $orders = Order::latest()->get();
                return view('admins.services-report', compact(['services', 'orders']));

            }
            public function registerservices()
            {
                /*$harvests = Field::with('harvests')->get();*/
                return view('admins.register-services');

            }

            public function chart(){
      // return view('statics',['data' => $data]);
                return view('admins.home');
            }
            public function farmers(){
                $farmers = Farmer::with('fields')->latest()->get();
                $post = DB::table('crop')->get('*')->toArray();
                foreach($post as $row)
                {
                  $data[] = array
                  (
                    'label'=>$row->crop,
                    'y'=>$row->expectedvolume
                ); 
              }
      // return view('statics',['data' => $data]);
              return view('admins.farmers', ['data' => $data, 'farmers' => $farmers]);
          }

          public function services(){
            return view('admins.services');
        }

    // public function farmerinfo(){
    //     $farmers = Farmer::with('fields')->get()
    //     return view('admins.home', compact('farmers'))
    // }

        public function updatefarmer(Request $request, $id)
        {
            $id = $request['id'];
            $farmer = Farmer::find($id);
            $farmer->fields()->create([
                'farmer_id' => $id,
                'fieldname' => $request['fieldname'],
                'farmsize' => $request['farmsize'],
                'fmaincrop' => $request['fmaincrop'],
                'fothercrop' => $request['fothercrop'],      
            ]);
            return response()->json(['success'=>'Field is successfully added']);


        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $farmer = $request->all();
        // dd($farmer);
     $farmer =  Farmer::create($request->all());
     return redirect('admin/register-farmer')->with('success', 'Saved Successfully');
 }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function show(Farmer $farmer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmer $farmer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farmer $farmer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmer $farmer)
    {
        //
    }
}
