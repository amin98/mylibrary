<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'street',
        'house_number',
        'postal_code',
        'city',
        'country',
        'phone',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //method from the Sluggable package
    //name column in 'users' can be user as a slug.
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    //send a notification including the mail address of the user
    public function routeNotificationForMail($notification)
    {
        // Return email address only...
        return $this->email;
    }

    //Belongs to relationship with the Role object
    public function role()
    {
        return $this->BelongsTo(Role::class);
    }

    //check if the user has the role title of 'admin'
    public function isAdmin()
    {
        // Check if the 'role' relationship is loaded
        if ($this->relationLoaded('role') && $this->role) {
            return $this->role->title === 'admin';
        }

        return false;
    }


    //one to many relationship with the Loan object, a user can have many loans
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    //Check if the last order has exceeded the expiration date
    public function isBlackListed()
    {
        $loan = false;

        if(Loan::exists()){
            $loan = $this->hasMany(Loan::class)
                ->whereHandedIn(0)
                ->first()
                ->created_at
                ->addWeeks(6)
                ->lessThan(now());
        }

        return $loan;
    }
}
