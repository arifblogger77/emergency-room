<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;

    protected $table = 'nurse';
    public $timestamps = false;
    protected $primaryKey = 'nid';
    protected $fillable = ['nid'];

    public function worker()
    {
        return $this->belongsTo(Worker::class, 'nid', 'wid');
    }

    public function meda()
    {
        return $this->hasMany(Meda::class, 'nid', 'nid');
    }

    public function nons()
    {
        return $this->hasMany(Nons::class, 'nid', 'nid');
    }
}
