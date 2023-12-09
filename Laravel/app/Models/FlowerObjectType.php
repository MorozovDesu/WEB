<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowerObjectType extends Model
{
    use HasFactory;
    protected $table = "flower_object_types";
    public $timestamps = false;
}
