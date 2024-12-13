<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tambahkan 'image' ke dalam $fillable agar bisa diassign dengan mass assignment
    protected $fillable = ['name', 'description', 'price', 'stock', 'image'];
}
