<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{   
    use HasFactory;
    protected $fillable = ['title', 'description', 'type','start','end','allDay','backgroundColor','grado'];

    protected $table = "activities";
}
