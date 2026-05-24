<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitIndicatorsRequest;
use App\Models\HabitIndikator;
use App\Models\Habits;
use Exception;
use Illuminate\Http\Request;

class MasterHabitIndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Habits $habit)
    {
        $query = HabitIndikator::where("habit_id",$habit->id);

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
    public function store(HabitIndicatorsRequest $request,Habits $habit)
    {
        $record = new HabitIndikator();
        $record->habit_id = $habit->id;
        $record->name = $request->input("name");
        $record->achievement_criteria  = $request->input("achievement_criteria");
        $record->assessment  = $request->input("assessment");
        $record->score  = $request->input("score");
        $record->order  = $request->input("order");
        $record->save();
        return response()->json($record);
    }

    /**
     * Display the specified resource.
     */
    public function show(HabitIndikator $habit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HabitIndikator $habit)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitIndicatorsRequest $request, Habits $habit, HabitIndikator $indicator)
    {
        //
        if($indicator->habit_id != $habit->id){
            throw new Exception("Different Habit...");
        }
        $record = $indicator;
        $record->habit_id = $habit->id;
        $record->name = $request->input("name");
        $record->achievement_criteria  = $request->input("achievement_criteria");
        $record->assessment  = $request->input("assessment");
        $record->score  = $request->input("score");
        $record->order  = $request->input("order");
        $record->save();
        return response()->json($record);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habits $habit, HabitIndikator $indicator)
    {
        
        if($indicator->habit_id != $habit->id){
            throw new Exception("Different Habit...");
        }

        $record = $indicator;
        $record->delete();
        return response()->json($record);
    }

}
