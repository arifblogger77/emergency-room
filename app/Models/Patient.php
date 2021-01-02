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
        return $this->hasOne(Person::class, 'pid', 'pid');
    }
}
