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
                return 'users'.DIRECTORY_SEPARATOR.$media->model_id.DIRECTORY_SEPARATOR.'avatar'.DIRECTORY_SEPARATOR.$media->id.DIRECTORY_SEPARATOR;
                break;
            
            case Mail::class:
                return 'emails'.DIRECTORY_SEPARATOR.$media->model_id.DIRECTORY_SEPARATOR.'attachments'.DIRECTORY_SEPARATOR.$media->id.DIRECTORY_SEPARATOR;
                break;
            
            case TemplateElement::class:
                return 'templates_elements'.DIRECTORY_SEPARATOR.$media->model_id.DIRECTORY_SEPARATOR.$media->id.DIRECTORY_SEPARATOR;
                break;
                
            default:
                return $media->id.DIRECTORY_SEPARATOR;
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