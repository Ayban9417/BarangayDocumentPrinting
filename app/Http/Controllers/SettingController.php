<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Barangay;
use App\Models\Setting;
use App\Models\BarangayOfficial;
use App\Models\Sector;
use App\Models\UserRole;

class SettingController extends Controller
{

    public function __construct()
    {
        //Array portion is for you to except pages.
        //$this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexUserRoles()
    {
        if(!Auth::guest())
        {
            if (!Session::has('locked'))
            {
                $data = UserRole::all();
                return view('settings.user_role', compact('data'));
            }
            else
            {
                return redirect('/locked');
            }
        }
        else
        {
            return redirect()->guest('login');
        }
    }

    public function indexBrgy()
    {
        if (!Session::has('locked'))
        {
            $data = Barangay::all();
            return view('settings.barangay', compact('data'));
        }
        else
        {
            return redirect('/locked');
        }     
    }

    public function indexBrgyOf()
    {
        if (!Session::has('locked'))
        {
            $data = BarangayOfficial::all();
            return view('settings.officers', compact('data'));
        }
        else
        {
            return redirect('/locked');
        }     
    }

    public function updateOff(Request $request, $id)
    {
        
        $data = BarangayOfficial::findOrFail($id);
        $data->name = $request->input('name');
        $data->position = $request->input('position');
        $data->save();
    
        return redirect()->back()->with('success', 'Official updated successfully.');
    }

    public function updatep(Request $request, $id)
    {
        
        $data = Barangay::findOrFail($id);
        $data->barangay = $request->input('barangay');
        $data->save();
    
        return redirect()->back()->with('success', 'Barangay updated successfully.');
    }

        public function storep(Request $request)
    {
        $barangay = new Barangay();
        $barangay->barangay = $request->input('barangay');
        $barangay->save();

        return redirect()->back()->with('success', 'Barangay added successfully.');
    }


    public function storeOff(Request  $request)
    {
        // $official = new BarangayOfficial();
        // $official->name = $request->input('first_name') . ' ' . $request->input('last_name');
        // $official->resident_id = $request->input('resident_id');
        // $official->position = $request->input('position'); // New line
        // $official->save();

        // return redirect()->back()->with('success', 'Official added successfully!');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSctr()
    {
        if (!Session::has('locked'))
        {
            $data = Sector::all();
            return view('settings.sector', compact('data'));
        }
        else
        {
            return redirect('/locked');
        }    
    }

    public function boot()
    {
        // Fetch the settings data
        $settings = Setting::firstOrFail();

        // Share the settings data with all views
        View::share('settings', $settings);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $settings = Setting::firstOrFail();
    
        return view('/resources/views/welcome.blade.php', ['settings' => $settings]);    
    }

    public function shows($id)
    {
        //
        $date = BarangayOfficial::findOrFail($id);

        return view('settings.shows', compact('official'));  
    }

    public function showp($id)
    {
        //
        $date = Barangay::findOrFail($id);

        return view('settings.showp', compact('barangay'));  
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $settings = Setting::firstOrFail();
        return view('settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //$settings = Setting::firstOrFail();
        $settings = Setting::firstOrFail();

       
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $imageUrl = asset('storage/images/' . $imageName);
            $settings->logo = $imageUrl;
        }       
        
        
           
    
        $settings->name = $request->name;
        $settings->municipality = $request->municipality;
        $settings->province = $request->province;
        $settings->save();
    
        return redirect()->back()->with('success', 'Settings updated successfully.');
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
        $barangay = Barangay::findOrFail($id);
        
        // Delete the Barangay
        $barangay->delete();
        
        // Redirect to the settings page with a success message
        return redirect()->back()->with('success', 'Purok Succesfully Deleted.');
    }
}
