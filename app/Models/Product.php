<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $primaryKey='ProductID';
    public $table="Products";
    public $fillable=[
    "ProductName",
    "SupplierID",
    "CategoryID",
    "QuantityPerUnit",
    "UnitPrice",
    "UnitsInStock",
    "UnitsOnOrder",
    "ReorderLevel",
    "Discontinued"];

    public $timestamps = false;
}
