<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Http\Requests\StoreSectorRequest;
use App\Http\Requests\UpdateSectorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class SectorController extends Controller
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

    public function sectorsindex()
    {
        if (!Session::has('locked'))
        {
            if(Auth::user())
            {
                return view('sectors.index');
            }
            else
            {
                return view('errors.401');
            }
        }
        else
        {
            return redirect('/locked');
        }    
    }
    
    public function create()
    {
        return view('sectors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sector' => 'required|unique:sectors',
        ]);

        $sector = new Sector();
        $sector->sector = $request->input('sector');
        $sector->save();

        return redirect()->route('sector.index')->with('success', 'Sector created successfully.');
    }

    public function edit($id)
    {
        $sector = Sector::findOrFail($id);
        return view('sectors.edit', compact('sector'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sector' => 'required|unique:sectors,sector,' . $id,
        ]);

        $sector = Sector::findOrFail($id);
        $sector->sector = $request->input('sector');
        $sector->save();

        return redirect()->route('settings.sector')->with('success', 'Sector updated successfully.');
    }

    public function destroy($id)
    {
        $sector = Sector::findOrFail($id);
        $sector->delete();

        return redirect()->route('sector.indexSctr')->with('success', 'Sector deleted successfully.');
    }
}