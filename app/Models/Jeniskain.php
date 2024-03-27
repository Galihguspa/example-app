<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jeniskain extends Model
{
    use HasFactory;
    protected $table = 'jeniskain';
    protected $primaryKey = 'id';
}
