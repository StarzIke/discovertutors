<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded=['id'];
    protected $table='profiles';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'profile_picture',
        'cv',
        'cover_letter',
        'video',
        'personal_profile',
        'gender',
        'charges',
        'tagline',
        'job_type',
        'subject'
    ];
}
