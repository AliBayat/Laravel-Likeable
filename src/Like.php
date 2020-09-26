<?php

namespace AliBayat\LaravelLikeable;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Laravel Likeable Package by Ali Bayat.
 */

class Like extends Eloquent
{
	protected $table = 'likeable_likes';
	public $timestamps = true;
	protected $fillable = ['likeable_id', 'likeable_type', 'user_id'];

	public function likeable()
	{
		return $this->morphTo();
	}
}
