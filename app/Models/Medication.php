<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $table = 'medication';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function med()
    {
        return $this->hasMany(Med::class, 'medication_id', 'id');
    }
}
