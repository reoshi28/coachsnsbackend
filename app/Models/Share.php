<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    public static $rules = array(
        'share' => 'required | max:120',
    );
    public function getData()
    {
        return $this->id . ':' . $this->share . '(' . $this->contact->name . ')';
    }
    public function contact()
    {
        return $this->belongsTo('App\Models\contact');
    }
}
