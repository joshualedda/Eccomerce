<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;
    protected $table = 'chart';
    protected $fillable = [
        'student',
        'campus'//0:Nluc, 1: MLUC, 2: SLUC
    ];
}
