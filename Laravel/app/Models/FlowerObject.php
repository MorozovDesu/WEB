<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FlowerObject extends Model
{
    use HasFactory;

    protected $table = "flower_objects"; // Можно было не праписовать тк, название бд создано по правилом его наименования
    public $timestamps = false;

    public function getImageUrlAttribute()
    {
        if ($this->image && Storage::disk()->exists($this->image)) {
            $image = Storage::url($this->image);
        } else {
            $image = $this->image;
        }
        return $image;
    }

}
