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
        return $this->hasOne(Hasa::class, 'id', 'id');
    }
    public function hase()
    {
        return $this->hasOne(Hase::class, 'id', 'id');
    }

    public function hasp()
    {
        return $this->hasOne(Hasp::class, 'id', 'id');
    }

    public function patient()
    {
        return $this->hasOne(Patient::class, 'pid', 'pid');
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'did', 'did');
    }
}
