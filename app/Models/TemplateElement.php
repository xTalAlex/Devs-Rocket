<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;

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

        $this->addMediaConversion('thumbnail')
            ->width(256)
            ->height(256);
    }

    public function template(){
        return $this->belongsTo(Template::class);
    }

    public function getImageAttribute(){
        return $this->getFirstMediaUrl('image');
    }

    public function getThumbnailAttribute(){
        return $this->getFirstMediaUrl('image','thumbnail');
    }

    public function setImageAttribute($value){
        if($value){
            if( Str::startsWith($value,'data:') ){
                $name='element_image';//assegnargli ID del media model 
                $ext=explode('/', explode(':', substr($value, 0, strpos($value, ';')))[1])[1];
                $this->addMediaFromBase64($value)->usingName($name)->usingFileName($name.'.'.$ext)->toMediaCollection('image');
            }
        }
        else{
            $this->destroy($this->id);
        }
    }
}
