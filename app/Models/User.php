<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'verification_code',
        'is_verified'
    ];

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
   
    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }
    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->user_identifier = rand(10000, 99999); // توليد رقم عشوائي مكون من 5 أرقام
        });
    }
}
