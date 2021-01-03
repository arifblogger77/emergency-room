<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $table = 'medication';

    protected $primaryKey = 'name';
    protected $fillable = ['name'];

    public $incrementing = false;

    public $timestamps = false;

    public function med()
    {
        return $this->hasMany(Hase::class, 'med', 'name');
    }
}
