<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class song extends Model
{
    use HasFactory;
    protected $table = "info_song";
    protected $guarded = [];
    protected $perPage = 10;

    public function categorys(){
        return $this->hasOne(categoryModels::class, "id", "id_theloai");
    }
}
