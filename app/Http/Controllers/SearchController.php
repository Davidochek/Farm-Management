<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Diseases;
use App\Models\Pests;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function autocomplete(Request $request)
    {
    	$data = Crop::select('name')->where("name", "LIKE", "%{$request->input('query')}%")->get();
    	return response()->json($data);
    }

   public function searchPest(Request $request)
   {
   	$pest_slug = Str::slug($request->q, '-');
   	if ($pest_slug) {
   		// return redirect()->route('showPests');
   		return redirect('/showPests/'.$pest_slug);
   	} else {
   		return back();
   	}
   }


 public function searchDisease(Request $request)
   {
   	$disease_slug = Str::slug($request->q, '-');
   	if ($disease_slug) {
   		// return redirect()->route('showPests');
   		return redirect('/showDiseases/'.$disease_slug);
   	} else {
   		return back();
   	}
   }

    public function showPests($id)
    { 
    	
    	// dd($pest_slug);
      
       $pests = Crop::with('pests')->where('id', $id)->firstOrFail();
        return view('crops.showpests')->with('pests', $pests);
    }

    // public function showPests($pest_slug)
    // { 
      
    //    $pests = Crop::with('pests')->where('name', $pest_slug)->firstOrFail();
    //     return view('crops.showpests')->with('pests', $pests);
    // }

     public function showDiseases($id)
    { 
    	
    	// dd($pest_slug);
       $diseases = Crop::with('diseases')->where('id', $id)->firstOrFail();
        return view('crops.showdiseases')->with('diseases', $diseases);
    } 

    // public function showDiseases($disease_slug)
    // { 
    //    $diseases = Crop::with('diseases')->where('name', $disease_slug)->firstOrFail();
    //     return view('crops.showdiseases')->with('diseases', $diseases);
    // }


    public function showPestDetails($id)
    { 
      
      // dd($pest_slug);
       $pestdetails = Pests::with('crops')->where('id', $id)->firstOrFail();
       foreach ($pestdetails->crops as $crop) {
         $crop_id = $crop->id;
       }
       $pests = Crop::with('pests')->where('id', $crop_id)->firstOrFail();
        return view('crops.showpestdetails')->with('pestdetails', $pestdetails)->with('pests', $pests);
    }

     public function showPestPesticides($id){
      // dd($id);
       $pestdetails = Pests::with('crops')->where('id', $id)->firstOrFail();
       foreach ($pestdetails->crops as $crop) {
         $crop_id = $crop->id;
       }
       $pesticides = Crop::with('pesticides')->where('id', $crop_id)->firstOrFail();
        return view('crops.showPestPesticides')->with('pestdetails', $pestdetails)->with('pesticides', $pesticides);
      // $pesticides = Crop::with('pesticides')->where('id', $id)->firstOrFail();
      // return view('crops.showPestPesticides', compact('pesticides'));
     }

     public function showDiseaseDetails($id)
    { 
      
      // dd($pest_slug);
       $diseasedetails = Diseases::with('crops')->where('id', $id)->firstOrFail();
       foreach ($diseasedetails->crops as $crop) {
         $crop_id = $crop->id;
       }
       $diseases = Crop::with('diseases')->where('id', $crop_id)->firstOrFail();
        return view('crops.showdiseasedetails')->with('diseasedetails', $diseasedetails)->with('diseases', $diseases);
    }
    public function showDiseasePesticides($id){

     $pestdetails = Diseases::with('crops')->where('id', $id)->firstOrFail();
       foreach ($pestdetails->crops as $crop) {
         $crop_id = $crop->id;
       }
       $pesticides = Crop::with('pesticides')->where('id', $crop_id)->firstOrFail();
        return view('crops.showDiseasePesticides')->with('pestdetails', $pestdetails)->with('pesticides', $pesticides);
     }

    public function searchPests(Request $request)
    {
      // return $request->all();
      // echo $request->searchPests;
      $searchData = $request->searchPests;
      // $pests = Crop::with('pests')->where('name', $pest_slug)->firstOrFail();
      //   return view('crops.showpests')->with('pests', $pests);
      // $pestdetails = Pests::with('crops')->where('name', 'like', '%' . $searchData . '%')->firstOrFail();
      //   return view('crops.showpestdetails')->with('pestdetails', $pestdetails);
      $pests = DB::table('pests')
      ->where('name', 'like', '%' . $searchData . '%')
      ->get();
      return $pests;
      // return view('crops.showpests', [
      //   'pests' => $pests, 'catByUser' => $searchData
      // ]);

    }
}
