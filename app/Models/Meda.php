<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meda extends Model
{
    use HasFactory;

    protected $table = 'meda';
    public $timestamps = false;
    protected $primaryKey = 'px';
    protected $fillable = ['nid', 'shiftid'];

    public function nurse()
    {
        return $this->belongsTo(Nurse::class, 'nid', 'nid');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shiftid', 'shiftid');
    }
}
