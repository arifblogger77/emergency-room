<?php

namespace App\Models;

use App\Models\Med;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctor';
    public $timestamps = false;
    protected $primaryKey = 'did';
    protected $fillable = ['did'];

    public function med()
    {
        return $this->hasMany(Med::class, 'did', 'did');
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class, 'did', 'wid');
    }

    public function dons()
    {
        return $this->hasOne(Dons::class, 'did', 'did');
    }

    public function triageby()
    {
        return $this->hasMany(Triageby::class, 'did', 'did');
    }
}
