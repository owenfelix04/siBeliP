<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masuk extends Model
{
    use HasFactory;

    protected $fillable = ['kd_masuk', 'tgl_masuk', 'kd_supplier', 'total_masuk'];

    protected $primaryKey = 'kd_masuk';
    public $incrementing = false; // Disable incrementing as the key is not an auto-incrementing integer
    protected $keyType = 'string';
}
