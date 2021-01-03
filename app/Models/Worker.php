<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $table = 'worker';
    public $timestamps = false;
    protected $primaryKey = 'wid';

    public function person()
    {
        return $this->belongsTo(Person::class, 'id', 'id');
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'did', 'wid');
    }

    public function nurse()
    {
        return $this->hasOne(Doctor::class, 'nid', 'wid');
    }

    public function reseptionist()
    {
        return $this->hasOne(Reseptionist::class, 'rid', 'wid');
    }
}
