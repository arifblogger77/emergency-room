<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rons extends Model
{
    use HasFactory;

    protected $table = 'rons';
    protected $primaryKey = 'rid';
    protected $fillable = ['rid', 'shiftid'];
    public $timestamps = false;

    public function receptionist()
    {
        return $this->belongsTo(Receptionist::class, 'rid', 'rid');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shiftid', 'shiftid');
    }
}
