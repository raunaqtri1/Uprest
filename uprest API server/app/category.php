<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
	public function users()
	{
		return $this->belongsToMany('App\User', 'interest_category', 'category_id', 'user_id');
	}
    protected $table = 'categories';
    protected $fillable = ['category'];
}
