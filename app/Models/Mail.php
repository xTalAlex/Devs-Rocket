<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Mail extends Model implements  HasMedia
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public $appends = [
        'attachment',
    ];

    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaCollection('attachment')
            ->useDisk('s3')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg','application/pdf','application/zip']);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getAttachmentAttribute(){
        return $this->getFirstMediaUrl('attachment');
    }
}
