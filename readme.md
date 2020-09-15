
## Installation

Install dependencies

`composer install`

Generate a new key for your app

`php artisan key:generate`

Reload Database

`php artisan migrate:refresh --seed`

Set QUEUE_CONNECTION = database in .env file 

Done, You're ready to go

`php artisan queue:work`
`php artisan serve`

Type this link {base_url}/users/import
