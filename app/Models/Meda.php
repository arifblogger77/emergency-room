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
    protected $fillable = ['px', 'nid', 'shiftid'];

    public function nons()
    {
        return $this->belongsTo(Nons::class, 'nid', 'nid');
    }

    public function med()
    {
        return $this->belongsTo(Med::class, 'px', 'px');
    }
}
