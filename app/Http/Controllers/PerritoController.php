<?php

namespace App\Http\Controllers;

use App\Models\Perrito;
use Illuminate\Http\Request;

class PerritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Perrito::with('raza')->get();
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
        $request->validate([
            'name-perrito' => 'required|String|unique:perritos,name',
            'raza-perrito' => 'required|Numeric',
            'color-perrito' => 'required|String'
        ]);
        try {
            $newPerrito = Perrito::create([
                'name'      => $request['name-perrito'],
                'raza_id'   => $request['raza-perrito'],
                'color'     => $request['color-perrito']
            ]);
            $newPerrito->load('raza');
            return $newPerrito;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perrito  $perrito
     * @return \Illuminate\Http\Response
     */
    public function show(Perrito $perrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perrito  $perrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Perrito $perrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perrito  $perrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perrito $perrito)
    {
        $request->validate([
            'name' => 'required|unique:perritos,name,'.$request['id']
        ]);
        try {
            Perrito::where('id', $request['id'])->update([
                'name'      => $request['name'],
                'raza_id'   => $request['raza_id'],
                'color'     => $request['color']
            ]);
            return $perrito->fresh('raza');
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perrito  $perrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perrito $perrito)
    {
        try {
            $perrito->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}


