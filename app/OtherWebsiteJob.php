<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherWebsiteJob extends Model
{
	protected $table = 'other_jobs';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];
}
