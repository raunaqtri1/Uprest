<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class interest_category extends Model
{
    protected $table = 'interest_category';
    protected $fillable = ['user_id,category_id'];    
}
