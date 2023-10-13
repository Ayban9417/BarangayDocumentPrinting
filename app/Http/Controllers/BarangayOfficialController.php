<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Resident;
use App\Models\BarangayOfficial;
use App\Http\Requests\StoreBarangayOfficialRequest;
use App\Http\Requests\UpdateBarangayOfficialRequest;

class BarangayOfficialController extends Controller
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
    public function index()
    {
        //
        if(!Auth::guest())
        {
            if (!Session::has('locked'))
            {
                if(Auth::user()->usertype != "barangay")
                {
                    $bgry = BarangayOffical::all();
                    return view('barangay_officials.index', compact('bgry'));
                }
                //Unauthorized User
                {
                    return view('errors.401');
                }
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
     * @param  \App\Http\Requests\StoreBarangayOfficialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangayOfficialRequest $request)
    {
        //
        $official = new BarangayOfficial();
        $official->name = $request->input('first_name') . ' ' . $request->input('last_name');
        //$official->resident_id = $request->input('resident_id');
        $official->position = $request->input('position'); // New line
        $official->save();

        return redirect()->back()->with('success', 'Official added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangayOfficial  $barangayOfficial
     * @return \Illuminate\Http\Response
     */
    public function show(BarangayOfficial $barangayOfficial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangayOfficial  $barangayOfficial
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangayOfficial $barangayOfficial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangayOfficialRequest  $request
     * @param  \App\Models\BarangayOfficial  $barangayOfficial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangayOfficialRequest $request, BarangayOfficial $barangayOfficial)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangayOfficial  $barangayOfficial
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangayOfficial $barangayOfficial)
    {
        //
    }
}