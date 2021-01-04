<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nons extends Model
{
    use HasFactory;

    protected $table = 'nons';
    protected $primaryKey = 'nid';
    protected $fillable = ['nid', 'shiftid'];
    public $timestamps = false;

    public function nurse()
    {
        return $this->belongsTo(Nurse::class, 'nid', 'nid');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shiftid', 'shiftid');
    }

}
