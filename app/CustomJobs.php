<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomJobs extends Model
{

    protected $table = 'custom_jobs';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];

}
