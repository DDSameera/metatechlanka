## Metatech Lanka assignment

## 1.0 Getting Start

## 1.0.1. Basic Setup
1. Run this Command to clone project
   `git clone https://github.com/DDSameera/metatechlanka.git`

2. Rename ".env.example" tp ".env" 
(This is only for demonstration purpose.Not Recommend way in industry level)

3. Run `php artisan config:clear`

4. Run `php artisan config:cache`

5. Run `php artisan key:generate`

6. Run `php artisan migrate:fresh --seed`

7. Run `php artisan test` for Unit Test

8. Run `php artisan dusk` for Browser Test

## 1.0.3 Showing Uplaod Images

Run `php artisan storage:link`

![alt](https://link)

## 1.0.2. Installation 
1. Open Terminal
2. Go to Project Folder Eg: cd xxxx
3. Install Dependencies . Run Command `composer install`
4. Run `npm install && npm dev run`  (Node Runtime Required*)

## 1.0.3. Server URL
### ``http://127.0.0.1:8000``

## 1.0.4 Used Artisan Commnad Lists
1. `php artisan optimize`
2. `php artisan config:cache`
3. `php artisan config:clear`
4. `php artisan route:list`
5. `php artisan key:generate`
6. `php artisan migrate:fresh --seed`
7. `php artisan make:model UserModel -m`
8. `php artisan make:controller UserController -r`
9. `php artisan make:test LoginTest --unit`
10. `php artisan dusk`

