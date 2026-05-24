<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Habits extends Model
{
    //
    public $table = "habits";

    protected static function booted(): void
    {
        static::creating(function ($model) {

            // contoh isi kolom uuid
            $model->uuid = (string) Str::uuid();
        });
        static::created(function ($model) {

            $model->slug = $model->id . "-" . Str::slug($model->name);
            $model->save();
        });
    }

    public function objIndikators()
    {
        return $this->hasMany(HabitIndikator::class, "habit_id", "id")->orderBy("order", "asc");
    }

    public static function generate(){
        $habits = Habits::with(["objIndikators"])->get();
        $students = Student::all();
        $date = Carbon::createFromDate(2026,6,1);
        $dates = Collection::times(
            $date->daysInMonth,
            fn ($day) => $date->copy()->day($day)
        );
        
        $habits->each(function($habit) use($students,$dates){
            $habit->objIndikators()->each(function($indicator) use($students,$dates){
                $students->each(function($student) use($dates,$indicator){
                    $dates->each(function($d) use($student,$indicator){
                        $activity = new StudentActivity();
                        $activity->indicator_id = $indicator->id;
                        $activity->student_id = $student->id;
                        $activity->tgl = $d;
                        $activity->skor = "0";
                        $activity->save();
                    });
                });
            });
            
        });

        echo "done";
        
    }
}
