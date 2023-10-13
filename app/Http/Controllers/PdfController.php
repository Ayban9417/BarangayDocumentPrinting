<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog;
use App\Models\Barangay;
use App\Models\Resident;
use App\Models\BarangayOfficial;
use App\Models\ResidentSector;
use App\Models\Sector;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orNo = $request->query('orNo');

        set_time_limit(300);
        $residentId = $request->input('residentId');
        $item = Resident::find($residentId);
        $cman = BarangayOfficial::where('position', 'Barangay Chairman')
        ->orWhere('position', 'Barangay Captain')
        ->first();
        $sec =BarangayOfficial::where('position','Secretary')->first();
        $data = [
            'item' => $item,
            'cman' => $cman,   
            'sec' => $sec,
            'orNo' => $orNo,  
          
        ];
        $new_log_activity = new ActivityLog();
        $new_log_activity->id = floor(time() - 999999999);
        $new_log_activity->user_id = auth()->user()->id;
        $new_log_activity->name = auth()->user()->name;
        $new_log_activity->module = "Resident";
        $new_log_activity->action = "Printed Barangay Clearance - " . ucfirst($item->lastname) . ', ' . ucfirst($item->firstname);
        $new_log_activity->url = url()->current();
        $new_log_activity->ip = request()->ip();
        $new_log_activity->agent = request()->header('User-Agent');
        $new_log_activity->resident_id = $item->id;
        $new_log_activity->save();

        $pdf = \PDF::loadView('Forms.BarangayClearance',compact('item', 'cman', 'sec','orNo'));
        $pdf->SetPaper('letter','portrait');

       
        
        return $pdf->stream('Certificate.pdf');
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function business(Request $request)
    {
        set_time_limit(300);

        $residentId = $request->input('residentId');
        $businessName = $request->input('businessName');
        $businessAddress = $request->input('businessAddress');
        $orNo = $request->input('orNo');

        $item = Resident::find($residentId);
        $cman = BarangayOfficial::where('position', 'Barangay Chairman')
        ->orWhere('position', 'Barangay Captain')
        ->first();
        $sec =BarangayOfficial::where('position','Secretary')->first();
        $data = [
            'item' => $item,
            'cman' => $cman,   
            'sec' => $sec,      
            'businessName' => $businessName,     
            'businessAddress' => $businessAddress, 
            'orNo' => $orNo,           
        ];

        $new_log_activity = new ActivityLog();
        $new_log_activity->id = floor(time() - 999999999);
        $new_log_activity->user_id = auth()->user()->id;
        $new_log_activity->name = auth()->user()->name;
        $new_log_activity->module = "Resident";
        $new_log_activity->action = "Printed Business Permit - " . ucfirst($item->lastname) . ', ' . ucfirst($item->firstname);
        $new_log_activity->url = url()->current();
        $new_log_activity->ip = request()->ip();
        $new_log_activity->agent = request()->header('User-Agent');
        $new_log_activity->resident_id = $item->id;
        $new_log_activity->save();
        $pdf = \PDF::loadView('Forms.Business',compact('item', 'cman', 'sec','businessName','businessAddress','orNo'));
        $pdf->SetPaper('letter','portrait');

       
        
        return $pdf->stream('Certificate.pdf');
    }


    public function loan(Request $request)
    {
        set_time_limit(300);

        $residentId = $request->input('residentId');
        $businessName = $request->input('businessName');
        $businessSpecification = $request->input('businessSpecification');
       // Generate auto-generated OR number
        $prefix = "OR-";
        $uniqueIdentifier = uniqid(); // Using uniqid() function to generate a unique identifier

        $orNo = $prefix . $uniqueIdentifier;

  


        $item = Resident::find($residentId);
        $cman = BarangayOfficial::where('position', 'Barangay Chairman')
        ->orWhere('position', 'Barangay Captain')
        ->first();
        $sec =BarangayOfficial::where('position','Secretary')->first();
        $data = [
            'item' => $item,
            'cman' => $cman,   
            'sec' => $sec,      
            'businessName' => $businessName,     
            'businessSpecification' => $businessSpecification, 
            'orNo' => $orNo,           
        ];

        $new_log_activity = new ActivityLog();
        $new_log_activity->id = floor(time() - 999999999);
        $new_log_activity->user_id = auth()->user()->id;
        $new_log_activity->name = auth()->user()->name;
        $new_log_activity->module = "Resident";
        $new_log_activity->action = "Printed Clearance for Loan - " . ucfirst($item->lastname) . ', ' . ucfirst($item->firstname);
        $new_log_activity->url = url()->current();
        $new_log_activity->ip = request()->ip();
        $new_log_activity->agent = request()->header('User-Agent');
        $new_log_activity->resident_id = $item->id;
        $new_log_activity->save();
        $pdf = \PDF::loadView('Forms.Loan',compact('item', 'cman', 'sec','businessName','orNo','businessSpecification'));
        $pdf->SetPaper('letter','portrait');

       
        
        return $pdf->stream('Certificate.pdf');
    }

    public function cutting(Request $request)
    {
        set_time_limit(300);

        $residentId = $request->input('residentId');
        $treeType = $request->input('treeType');
        $specification = $request->input('specification');
       // Generate auto-generated OR number
        $prefix = "OR-";
        $uniqueIdentifier = uniqid(); // Using uniqid() function to generate a unique identifier

        $orNo = $prefix . $uniqueIdentifier;

  


        $item = Resident::find($residentId);
        $cman = BarangayOfficial::where('position', 'Barangay Chairman')
        ->orWhere('position', 'Barangay Captain')
        ->first();
        $sec =BarangayOfficial::where('position','Secretary')->first();
        $data = [
            'item' => $item,
            'cman' => $cman,   
            'sec' => $sec,      
            'treeType' => $treeType,     
            'specification' => $specification, 
            'orNo' => $orNo,           
        ];

        $new_log_activity = new ActivityLog();
        $new_log_activity->id = floor(time() - 999999999);
        $new_log_activity->user_id = auth()->user()->id;
        $new_log_activity->name = auth()->user()->name;
        $new_log_activity->module = "Resident";
        $new_log_activity->action = "Printed Clearance for Cutting Trees - " . ucfirst($item->lastname) . ', ' . ucfirst($item->firstname);
        $new_log_activity->url = url()->current();
        $new_log_activity->ip = request()->ip();
        $new_log_activity->agent = request()->header('User-Agent');
        $new_log_activity->resident_id = $item->id;
        $new_log_activity->save();
        $pdf = \PDF::loadView('Forms.Cutting',compact('item', 'cman', 'sec','treeType','orNo','specification'));
        $pdf->SetPaper('letter','portrait');

       
        
        return $pdf->stream('Certificate.pdf');
    }


    //end of cutting
    public function indigency($id)
    {
        set_time_limit(300);
        $item = Resident::find($id);
        $cman = BarangayOfficial::where('position', 'Barangay Chairman')
            ->orWhere('position', 'Barangay Captain')
            ->first();
        $sec = BarangayOfficial::where('position', 'Secretary')->first();
        $prefix = "OR-";
        $uniqueIdentifier = uniqid(); // Using uniqid() function to generate a unique identifier

        $orNo = $prefix . $uniqueIdentifier;
    
        $data = [
            'item' => $item,
            'cman' => $cman,   
            'sec' => $sec,
            'orNo' => $orNo,   
        ];
    
        $new_log_activity = new ActivityLog();
        $new_log_activity->id = floor(time() - 999999999);
        $new_log_activity->user_id = auth()->user()->id;
        $new_log_activity->name = auth()->user()->name;
        $new_log_activity->module = "Resident";
        $new_log_activity->action = "Printed Certificate of Indigency - "  . ucfirst($item->lastname) . ', ' . ucfirst($item->firstname);
        $new_log_activity->url = url()->current();
        $new_log_activity->ip = request()->ip();
        $new_log_activity->agent = request()->header('User-Agent');
        $new_log_activity->resident_id = $item->id;
        $new_log_activity->save();
    
        $pdf = \PDF::loadView('Forms.Indigency', compact('item', 'cman', 'sec','orNo'));
        $pdf->SetPaper('letter', 'portrait');
        return $pdf->stream('Indigency.pdf');
    }
    

    public function file($id)
    {
        $post = Blotter::find($id);
        $cman = Officer::where('position','Chairman')->first();
        $sec = Officer::where('position','Secretary')->first();
        $pdf = DomPDF::loadView('Forms.FiletoAction',compact('post','cman','sec'));
        $pdf->SetPaper('letter','portrait');;
        return $pdf->stream();
    }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
