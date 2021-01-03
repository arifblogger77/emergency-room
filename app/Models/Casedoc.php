<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casedoc extends Model
{
    use HasFactory;

    protected $table = 'casedoc';
    public $timestamps = false;
    protected $fillable = ['pid', 'did', 'shiftid'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'pid', 'pid');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'did', 'did');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shiftid', 'shiftid');
    }

}
