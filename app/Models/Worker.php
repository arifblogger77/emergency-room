<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $table = 'worker';
    protected $primaryKey = 'wid';
    protected $fillable = ['wid'];

    public $timestamps = false;

    public function person()
    {
        return $this->belongsTo(Person::class, 'wid', 'id');
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'did', 'wid');
    }

    public function nurse()
    {
        return $this->hasOne(Nurse::class, 'nid', 'wid');
    }

    public function receptionist()
    {
        return $this->hasOne(Receptionist::class, 'rid', 'wid');
    }
}
