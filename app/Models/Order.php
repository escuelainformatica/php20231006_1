<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    public $primaryKey='OrderID';
    public $table="Order Details";

    public $fillable=["OrderID",
        "ProductID",
        "UnitPrice",
        "Quantity",
        "Discount"
    ];
    public $timestamps = false;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'ProductID','ProductID');
    }
}
