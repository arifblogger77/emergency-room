<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supby extends Model
{
    use HasFactory;

    protected $table = 'supby';
    public $timestamps = false;
    protected $fillable = ['bedno', 'nid', 'shiftid'];

    public function bed()
    {
        return $this->belongsTo(Bed::class, 'bedno', 'number');
    }

    public function nurse()
    {
        return $this->belongsTo(Nurse::class, 'nid', 'nid');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shiftid', 'shiftid');
    }
}
