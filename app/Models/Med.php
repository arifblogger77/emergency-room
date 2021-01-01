<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Med extends Model
{
    use HasFactory;

    protected $primaryKey = 'px';
    protected $table = 'med';
    protected $fillable = ['pid', 'did', 'med', 'dosage', 'medfrom', 'medto', 'howoften'];
    public $timestamps = false;

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
