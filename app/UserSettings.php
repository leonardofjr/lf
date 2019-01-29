<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    protected $table = "user_settings";
    protected $fillable = ['html', 'css'];
}
