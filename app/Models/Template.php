<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $guarded=[];

    public $appends = [
        'thumbnail',
    ];

    public function thumbnail_element(){
        return $this->belongsTo(TemplateElement::class,'template_element_id');
    }

    public function elements(){
        return $this->hasMany(TemplateElement::class);
    }

    public function getThumbnailAttribute(){
        if($this->thumbnail_element)
            return $this->thumbnail_element->thumbnail;
        elseif($this->elements()->exists()) 
            return $this->elements()->first()->thumbnail;
        else
            return null;
    }

}
