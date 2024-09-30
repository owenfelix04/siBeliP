<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;

    protected $fillable = ['kd_supplier', 'nama_supplier', 'alamat'];

    protected $primaryKey = 'kd_supplier';
    public $incrementing = false; // Disable incrementing as the key is not an auto-incrementing integer
    protected $keyType = 'string';
}
