<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjekSurvei extends Model
{
    use HasFactory;
    protected $table = 'objek_surveis';
    protected $guarded = ['id'];

    public function questions(){
        return $this->hasMany(Question::class);
    }
}
