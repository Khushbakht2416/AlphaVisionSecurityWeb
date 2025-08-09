<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminQuoteModel extends Model
{
    use HasFactory;

    protected $table = 'quote';
    protected $primary_key = 'id';
}
