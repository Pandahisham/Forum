<?php namespace Qrokodial\Forum\Contract;

interface ForumContract {
	/**
	 * Gets the Laravel relationship of the root sections listed in descending order by weight.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function index();
}
