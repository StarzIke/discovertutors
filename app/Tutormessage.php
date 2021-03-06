<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutormessage extends Model
{
    protected $guarded=['id'];
    protected $table='tutorMessage';
    protected $fillable = [
        'subject', 'message', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

}
