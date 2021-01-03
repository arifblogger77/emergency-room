<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = "person";

    protected $fillable = ['lastname', 'firstname', 'middlename'];
    public $timestamps = false;

    public function hasa()
    {
        return $this->hasMany(Hasa::class, 'id', 'id');
    }

    public function hase()
    {
        return $this->hasMany(Hase::class, 'id', 'id');
    }

    public function hasp()
    {
        return $this->hasMany(Hasp::class, 'id', 'id');
    }

    public function patient()
    {
        return $this->hasOne(Patient::class, 'pid', 'pid');
    }

    public function worker()
    {
        return $this->hasOne(Worker::class, 'wid', 'wid');
    }
}
