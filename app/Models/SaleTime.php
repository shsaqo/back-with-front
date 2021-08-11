<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleTime extends Model
{
    use HasFactory;
    protected $fillable = ['end_date'];
    protected $dates = ['end_date'];
}
