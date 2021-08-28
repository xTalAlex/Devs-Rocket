<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TemplateElement extends Model implements  HasMedia
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, InteractsWithMedia;

    protected $guarded=[];

    public $appends = [
        'image',
        'thumbnail'
    ];

    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaCollection('image','local')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg','image/png','video/mp4']);

        $this->addMediaConversion('thumb')
            ->width(256)
            ->height(256);
    }

    public function template(){
        return $this->hasOne(Template::class);
    }

    public function templates(){
        return $this->belongsToMany(Template::class,'templates_templates_elements');
    }

    public function getImageAttribute(){
        return $this->getFirstMediaUrl('image');
    }

    public function getThumbnailAttribute(){
        return $this->getFirstMediaUrl('image','thumb');
    }
}
