<?php namespace Qrokodial\Forum\Laravel;

use Illuminate\Support\Facades\Facade;
use Qrokodial\Forum\Contract\ForumContract;

class Forum extends Facade {
	protected static function getFacadeAccessor() {
		return ForumContract::class;
	}
}
