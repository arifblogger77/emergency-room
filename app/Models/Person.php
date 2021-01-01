<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\Patient;

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

    public function patient()
    {
        return $this->hasOne(Patient::class, 'pid', 'pid');
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'did', 'did');
    }
}
