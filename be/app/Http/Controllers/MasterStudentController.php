<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;

class MasterStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $query = Student::query();

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
    public function store(StudentRequest $request)
    {
        //
        $record = new Student();
        $record->nis = $request->input("nis");
        $record->sekolah_id = $request->input("sekolah_id");
        $record->name = $request->input("name");
        $record->save();
        return response()->json($record);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student)
    {
        //
        $record = $student;
        $record->nis = $request->input("nis");
        $record->sekolah_id = $request->input("sekolah_id");
        $record->name = $request->input("name");
        $record->save();
        return response()->json($record);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        $record = $student;
        $record->delete();
        return response()->json($record);
    }
}
