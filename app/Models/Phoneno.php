<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phoneno extends Model
{
    use HasFactory;

    protected $table = 'phoneno';

    protected $primaryKey = 'id';
    protected $fillable = ['areacode', 'number'];

    public $timestamps = false;

    public function hase()
    {
        return $this->hasMany(Hase::class, 'phoneno_id', 'id');
    }
}
