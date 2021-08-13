<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function users(){
        return $this->belongsToMany(Social::class,'social_user')->withPivot('link');
    }
}
