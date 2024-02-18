<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;
    protected $primaryKey = 'document_type_id';

    protected $table = 'documenttype';

    protected $guarded = ['document_type_id'];
}