<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    protected $fillable = ['title', 'description', 'type','start','end','allDay','backgroundColor','grado'];

    protected $table = "activities";
}
