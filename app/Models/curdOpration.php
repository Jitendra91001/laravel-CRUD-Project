<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class curdOpration extends Model
{
    use HasFactory;
    protected $table = 'curd_oprations';

    protected $fillable=
    [
        'first_name',
        'last_name',
        'email',
        'contact',
        'gender',
        'hobbies',
        'address',
        'country',
        'profile'
    ];
//this is a accesser and mutetter
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = Str::of($value)->trim()->lower();
    }

    public function setHobbiesAttribute($value)
    {
        $this->attributes['hobbies'] = implode(',',$value);
    }

    public function getHobbiesArrayAttribute()
    {
        return explode(',',$this->hobbies);
    }
}
