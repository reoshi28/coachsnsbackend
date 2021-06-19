<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required | max:20',
        'email' => 'required | email',
        'password' => 'required | min:6'
    );
    public function shares()
    {
        return $this->hasMany('App\Models\Share');
    }
    use HasFactory;
}
