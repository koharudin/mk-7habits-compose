<?php

namespace App\Http\Controllers;

use App\Http\Requests\SekolahRequest;
use App\Models\Sekolah;

class MasterSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $query = Sekolah::query();

        if (request()->has("use_pagination")) {
            $use_pagination = request()->input("use_pagination");
            if ($use_pagination == 1) {
                return $query->paginate();
            }
        }
        return response()->json($query->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SekolahRequest $request)
    {
        //
        $record = new Sekolah();
        $record->name = $request->input("name");
        $record->save();
        return response()->json($record);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sekolah $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sekolah $sekolah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SekolahRequest $request, Sekolah $sekolah)
    {
        //
        $record = $sekolah;
        $record->name = $request->input("name");
        $record->save();
        return response()->json($record);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sekolah $sekolah)
    {
        //
        $record = $sekolah;
        $record->delete();
        return response()->json($record);
    }
}
