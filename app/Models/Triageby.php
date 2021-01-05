<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Triageby extends Model
{
    use HasFactory;

    protected $table = 'triageby';
    public $timestamps = false;
    protected $fillable = ['pid', 'did'];
    protected $primaryKey = 'pid';

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'pid', 'pid');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'did', 'did');
    }
}
