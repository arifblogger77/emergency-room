<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adm extends Model
{
    use HasFactory;

    protected $table = 'adm';

    public $timestamps = false;

    protected $fillable = ['pid', 'rid', 'shiftid', 'admission'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'pid', 'pid');
    }

    public function receptionist()
    {
        return $this->belongsTo(Receptionist::class, 'rid', 'rid');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shiftid', 'shiftid');
    }
}
