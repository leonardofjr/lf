<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{       
        protected $table = "portfolio";
        protected $fillable = ['user_id', 'title', 'description', 'website_url', 'technologies', 'type'];

    public function portfolio_entries()
    {
        return $this->hasOne('App\PortfolioPhoto', 'portfolio_entry_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
