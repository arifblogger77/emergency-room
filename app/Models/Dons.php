<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dons extends Model
{
    use HasFactory;

    protected $table = 'dons';
    protected $primaryKey = 'did';
    protected $fillable = ['did', 'shiftid'];
    public $timestamps = false;

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'did', 'did');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shiftid', 'shiftid');
    }

    public function casedoc()
    {
        return $this->belongsTo(Casedoc::class, 'did', 'did');
    }
}
