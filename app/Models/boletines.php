<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boletines extends Model
{
    use HasFactory;
    protected $table = "boletines";

    protected $fillable=[
        "momento",
        "directorio",
        "student_id"
    ];

    public function student(){
        $this->belongsTo(student::class);
    }
}
