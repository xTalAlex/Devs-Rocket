<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements  HasMedia
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

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function socials(){
        return $this->belongsToMany(Social::class)->as('social_user')->withPivot('link');
    }

    public function isDeveloper(){
        return $this->role()->exists();
    }

    public function getAvatarAttribute(){
        return $this->getFirstMediaUrl('avatar') ? url($this->getFirstMediaUrl('avatar')) : '/assets/img/no_avatar.png';
    }

    public function getFullNameAttribute(){
        return $this->name.' '.$this->last_name;
    }
}
