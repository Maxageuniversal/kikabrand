<?php
// app/Models/Product.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = ['name', 'description', 'price', 'stock_quantity', 'category', 'image_url', 'inventory'];
}
