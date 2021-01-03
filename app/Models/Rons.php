<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rons extends Model
{
    use HasFactory;

    protected $table = 'rons';
    public $timestamps = false;
    protected $fillable = ['rid', 'shiftid'];

    public function recepionist()
    {
        return $this->belongsTo(receptionist::class, 'rid', 'rid');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shiftid', 'shiftid');
    }
}
