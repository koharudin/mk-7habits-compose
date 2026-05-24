<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
use App\Models\Habits;
use Illuminate\Http\Request;

class MasterHabitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $query = Habits::with(['objIndikators']);

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
    public function store(HabitRequest $request)
    {
        $record = new Habits();
        $record->name = $request->input("name");
        $record->description = $request->input("description");
        $record->save();
        return response()->json($record);
    }

    /**
     * Display the specified resource.
     */
    public function show(Habits $habit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habits $habit)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habits $habit)
    {
        //
        $habit->name = $request->input("name");
        $habit->description = $request->input("description");
        $habit->save();
        return response()->json($habit);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habits $habit)
    {
        //
        $habit->delete();
        return response()->json($habit);
    }

}
