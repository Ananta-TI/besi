<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = ['name', 'description', 'price', 'stock'];
}

=======
    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
    ];

}
>>>>>>> 233b4874440df655a2803db24d5f106a6d39ca41
