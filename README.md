# Requrement

1. PHP ^8.1
2. MySql 8.0
3. Composer 2.5.4

## CRUD
1. Create a new database on your mySql name what you want
2. Create three table (catalogs, categories, products)
3. Add rows to those tables 
  * catalogs( `id` (BIGINT), `title` (VARCHAR) ), 
  * categories(`id` (BIGINT), `catalog_id` (BIGINT), `title` (VARCHAR) ), 
  * products(`id` (BIGINT), `category_id` (BIGINT), `title` (VARCHAR) )
4. Integrate project with database in `.inv` file
5. Run command `composer install`
6. Run command `php artisan migrate --seed`
7. Run command `php artisan serve` 
8. Go to browser [http://localhost:8000](http://localhost:8000)
