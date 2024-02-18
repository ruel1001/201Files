<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    use HasFactory;
    protected $primaryKey = 'document_id';

    protected $table = 'documents';

    protected $guarded = ['document_id'];
}