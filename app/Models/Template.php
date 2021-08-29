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

    public function element(){
        return $this->belongsTo(TemplateElement::class,'template_element_id');
    }

    public function elements(){
        return $this->belongsToMany(TemplateElement::class,'templates_templates_elements');
    }

    public function getThumbnailAttribute(){
        return $this->element->thumbnail;
    }

}
