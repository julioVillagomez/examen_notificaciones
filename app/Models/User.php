<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'user_category');
    }

    public function channels(){
        return $this->belongsToMany(Channel::class,'user_channel');
    }

    public function routeNotificationForSms(Notification $notification): array|string
    {
        return $this->phone;
    }


    public function scopeFilterCategory($query,Category $category){
        return $query->whereHas('categories',function($q) use($category){
            $q->where('categories.id',$category->id);
        });
    }
}
