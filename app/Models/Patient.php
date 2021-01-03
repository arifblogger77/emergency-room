<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patient';
    public $timestamps = false;
    protected $primaryKey = 'pid';

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function med()
    {
        return $this->hasOne(Med::class, 'pid', 'pid');
    }

    public function adm()
    {
        return $this->hasMany(Adm::class, 'pid', 'pid');
    }

    public function beda()
    {
        return $this->hasMany(Beda::class, 'pid', 'pid');
    }

    public function casedoc()
    {
        return $this->hasMany(Casedoc::class, 'pid', 'pid');
    }

    public function triage()
    {
        return $this->hasMany(Triage::class, 'pid', 'pid');
    }
}
