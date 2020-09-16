
## Installation

Install dependencies

`composer install`

Generate a new key for your app

`php artisan key:generate`

Reload Database

`php artisan migrate

Set QUEUE_CONNECTION=database in .env file 

Done, You're ready to go

`* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1`

`php artisan queue:work`


`php artisan schedule:run`

`php artisan serve`

Type this link at Postman: 

`{{url}}/api/movies?category_id=18&title=American&popular=asc&rate=asc`
