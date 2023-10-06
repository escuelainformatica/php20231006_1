<?php
namespace App\Repo;
use App\Models\Order;
use App\Models\Product;

class OrderRepo {
    public function listar() {
        return Order::all();
    }
    /**
     * Esta funcion vende un producto si hay stock disponible y no esta descontinuado
     * @param int $orderID el numero de order
     * @param int $productID el numero de producto
     * @param int $cantidad la cantidad de producto a vender
     * @param int $descuento el descuento (opcional)
     * @return string vacio si no hay error, en caso contrario regresa un mensaje de error
     */
    public function venta(int $orderID,int $productID,int $cantidad,int $descuento=0):string {
        //$producto=Product::find($productID); // devuelve un producto
        $producto=Product
            ::where('productID',$productID)
            ->where("discontinued",0) // y ademas.
            ->get() // una coleccion
            ->first(); // 1er objeto del tipo producto (o nulo)
        if($producto===null) {
            return "producto no encontrado o descontinuado";
        }
        if($producto->UnitsInStock<$cantidad) {
            // no se puede vender mas del stock disponible.
            return "sin stock";
        }
        // descontar el producto
        $producto->UnitsInStock=$producto->UnitsInStock-$cantidad;
        $producto->save(); // actualizar, ya que $producto viene desde la base de datos
        // agregar la order
        $order=new Order();
        $order->OrderID=$orderID;
        $order->ProductID=$productID;
        $order->UnitPrice=$producto->UnitPrice;
        $order->Quantity=$cantidad;
        $order->Discount=$descuento;
        $order->save(); // insertar, ya que el producto NO viene desde la base de datos.
        return "";
    }
}