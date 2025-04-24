<?php

namespace App\Models;

use App\Models\ClassRom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phase extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function classRoom() {
        return $this->hasMany(ClassRom::class);
    }
}
