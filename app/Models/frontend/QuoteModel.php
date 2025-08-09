<?php

namespace App\Models\frontend;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuoteModel extends Model
{
    use HasFactory;
    protected $table = "quote"; 
    protected $primary_key = "id"; 
}
