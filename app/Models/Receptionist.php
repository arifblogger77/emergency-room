<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    use HasFactory;

    protected $table = 'receptionist';
    public $timestamps = false;
    protected $primaryKey = 'rid';
    protected $fillable = ['rid'];

    public function adm()
    {
        return $this->hasMany(Adm::class, 'rid', 'rid');
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class, 'rid', 'wid');
    }

    public function rons()
    {
        return $this->hasOne(Rons::class, 'rid', 'rid');
    }
}
