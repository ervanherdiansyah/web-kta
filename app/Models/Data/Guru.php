<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $guarded = ['id'];
}
