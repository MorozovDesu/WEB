<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowerObject extends Model
{
    use HasFactory;

    protected $table = "flower_objects";// Можно было не праписовать тк, название бд создано по правилом его наименования
}
