# ejercicio

Cree los siguientes modelos

* Bodega:
  * ID
  * ProductID
  * Cantidad
* Venta:
  * ID
  * ProductID
  * Cantidad
* Compra:
  * ID
  * ProductID
  * Cantidad

```shell
php artisan make:model Bodega --all
php artisan make:model Venta --all
php artisan make:model Compra --all
```

* Cree una base de datos vacio (cree un archivo vacio en database\database.sqlite)

* Edite la migracion y el modelo. No necesitamos seeder,controlador,route, ni factory.

Cree una clase Repo llamada:

* BodegaRepo
* funcion listar()
* funcion venta(ProductID,cantidad) donde se vende un producto de la bodega
* function compra(ProductID,cantidad) donde se compra un producto de la bodega

Y pruebelo con el tinker.