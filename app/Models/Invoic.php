<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoic extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getEnumValues()
    {
        $instance = new static;
        $table = $instance->getTable();
        
        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = 'payment_method'"))[0]->Type;
        
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        
        return collect(explode(',', $matches[1]))
            ->map(function($value) {
                return trim($value, "'");
            })
            ->toArray();
    }
    public function Students()
    {
        return $this->hasMany(Student::class);
    }

}
