<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements  HasMedia, MustVerifyEmail
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'last_seen',
        'biography',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_seen' => 'datetime',
    ];

    protected $appends = [
        'avatar',
        'full_name',
    ];

    /**
     * Scope a query to only include developers.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDeveloper($query)
    {
        return $query->has('role');
    }

    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(144)
              ->height(144);

        $this->addMediaCollection('avatar')
            ->singleFile()
            //->withResponsiveImages()
            ->acceptsMimeTypes(['image/jpeg','image/png','image/gif'])
            ->useFallbackUrl('/assets/img/no_avatar.png')
            ->useFallbackPath(public_path('/assets/img/no_avatar.png'));
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function socials(){
        return $this->belongsToMany(Social::class,'social_user')->withPivot('link');
    }

    public function mails(){
        return $this->hasMany(Mail::class);
    }

    public function isDeveloper(){
        return $this->role()->exists();
    }

    public function getAvatarAttribute(){
        return $this->getFirstMediaUrl('avatar');
    }

    public function getFullNameAttribute(){
        return $this->name.' '.$this->last_name;
    }
}
