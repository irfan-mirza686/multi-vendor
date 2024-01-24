<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class WholeSaler extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;
    protected $guard = 'wholesaler';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'business_name',
        'username',
        'slug',
        'package_id',
        'email',
        'password',
        'image',
        'shop_banner',
        'cnic',
        'mobile',
        'address',
        'settings',
        'location',
        'social_links',
        'status',
        'start_date',
        'end_date',
        'admin_id',
        'approvedBy_admin',
        'blockedBy_admin'
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
        'settings' => 'array',
        'location' => 'array',
        'social_links' => 'array',
        'address' => 'array'
    ];

    public function package(){
        return $this->belongsTo(PackageType::class,'package_id');
    }
}