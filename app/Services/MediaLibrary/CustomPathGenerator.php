<?php

namespace App\Services\MediaLibrary;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use App\Models\{User, Mail, TemplateElement};

class CustomPathGenerator implements PathGenerator
{

    public function getPath(Media $media) : string
    {
        switch($media->model_type){

            case User::class:
                return 'users/'.$media->model_id.'/avatar/'.$media->id.'/';
                break;
            
            case Mail::class:
                return 'emails/'.$media->model_id.'/attachments/'.$media->id.'/';
                break;
            
            case TemplateElement::class:
                return 'templates_elements/'.$media->model_id.'/'.$media->id.'/';
                break;
                
            default:
                return $media->id.'/';
        }   
    }

    public function getPathForConversions(Media $media) : string
    {
        return $this->getPath($media) . 'conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'responsive/';
    }

}