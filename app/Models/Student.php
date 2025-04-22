<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function classRom()
    {
        return $this->belongsTo(ClassRom::class);
    }
    public function invoice()
    {
        return $this->belongsTo(Invoic::class);
    }
    public function grad()
    {
        return $this->belongsTo(Grad::class);
    }
    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }
}
