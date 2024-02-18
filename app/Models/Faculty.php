<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Faculty extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'employee_id';

    protected $table = 'faculty';

    protected $guarded = ['employee_id'];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];  
}