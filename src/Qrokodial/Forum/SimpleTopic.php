<?php namespace Qrokodial\Forum;

use Illuminate\Database\Eloquent\Model;
use Qrokodial\Forum\Contract\TopicContract;
use Qrokodial\Forum\Traits\TopicTrait;

class SimpleTopic extends Model implements TopicContract {
	use TopicTrait;

	protected $table = "topics";
} 