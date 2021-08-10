<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function users(){
        return $this->belongsToMany(Social::class)->as('social_user')->withPivot('link');
    }
}
