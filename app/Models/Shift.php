<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $table = 'shift';

    protected $fillable = ['shiftid', 'from', 'to'];
    public $timestamps = false;
    protected $primaryKey = 'shiftid';

    // public function getFromAttribute($value)
    // {
    //     return Carbon::parse($value)->format('Y-m-d\TH:i');
    // }

    // public function getToAttribute($value)
    // {
    //     return Carbon::parse($value)->format('Y-m-d\TH:i');
    // }

    public function adm()
    {
        return $this->hasOne(Adm::class, 'shiftid', 'shiftid');
    }

    public function dons()
    {
        return $this->hasOne(Dons::class, 'shiftid', 'shiftid');
    }

    public function nons()
    {
        return $this->hasOne(Nons::class, 'shiftid', 'shiftid');
    }

    public function rons()
    {
        return $this->hasOne(Rons::class, 'shiftid', 'shiftid');
    }
}
