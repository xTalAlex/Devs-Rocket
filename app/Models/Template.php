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
        return $this->thumbnail_element ? $this->thumbnail_element->thumbnail : null;
    }

}
