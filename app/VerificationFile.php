<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificationFile extends Model
{
    protected $table = 'verification_files';
    public $timestamps = true;
    protected $guarded = ['id'];
    
    protected $fillable = [
        'full_path', 'file_name', 'company_id', 'comment', 'status'
    ];

    protected $dates = ['created_at', 'updated_at'];
}
