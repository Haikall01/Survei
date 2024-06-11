<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = ['text', 'objek_survei_id'];
    public function objek_surveis(){
        return $this->belongsTo(ObjekSurvei::class);
    }
}
