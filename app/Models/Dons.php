<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dons extends Model
{
    use HasFactory;

    protected $table = 'dons';
    public $timestamps = false;
    protected $fillable = ['did', 'shiftid'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'did', 'did');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shiftid', 'shiftid');
    }

}
