Laravel Likeable Package
============

This Package is for Laravel 5+ and makes it easy to implement Liking/Favoriting system for Eloquent's Models. just use the trait in the model and you're good to go.

#### Composer Install (for Laravel 5+)

	composer require alibayat/likeable

#### Publish and Run the migrations


```bash
php artisan vendor:publish --provider="AliBayat\LaravelLikeable\LikeableServiceProvider" --tag=migrations

php artisan migrate
```


if you're using Laravel version 5.5+, Likeable package will be auto-discovered by Laravel. and if not: register the package in config/app.php providers array manually.
```php
'providers' => [
	...
	\AliBayat\LaravelLikeable\LikeableServiceProvider::class,
],
```


#### Setup models - just use the Trait in the Model.

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use AliBayat\LaravelLikeable\Likeable;

class Post extends Model
{
	use Likeable;

}

```

#### Usage

```php
$post->like(); // like the post for current user
$post->like($userId); // pass in the user id
$post->like(0); // just adding likes to the count, and don't track any user

$post->unlike(); // remove like from the post
$post->unlike($userId); // pass in the user id
$post->unlike(0); // remove likes from the count -- does not check for user

$post->likeCount; // get Total count of likes

$post->likes; // Collection (Illuminate\Database\Eloquent\Collection) of existing likes 

$post->liked(); // check if currently logged in user liked the post
$post->liked($userId); // pass in the user id

Post::likedBy($userId) // find only posts where user liked them
	->with('likeCounter') // with eager loading
	->get();
```

#### Credits

 - Ali Bayat - <ali.bayat@live.com>
