<?php namespace Qrokodial\Forum;

use Illuminate\Database\Eloquent\Model;
use Qrokodial\Forum\Contract\SectionContract;
use Qrokodial\Forum\Traits\SectionTrait;

class SimpleSection extends Model implements SectionContract {
	use SectionTrait;

	protected $table = "sections";
}
