<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beda extends Model
{
    use HasFactory;

    protected $table = 'beda';
    public $timestamps = false;
    protected $fillable = ['pid', 'bedno', 'from', 'to'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'pid', 'pid');
    }

    public function bed()
    {
        return $this->belongsTo(Bed::class, 'bedno', 'bed');
    }
}
