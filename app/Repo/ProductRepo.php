<?php
namespace App\Repo;
use App\Models\Product;
class ProductRepo {
    public function listar() {
        return Product::all();
    }
    
}