<?php namespace Qrokodial\Forum;

use Config;
use Qrokodial\Forum\Contract\ForumContract;

class Forum implements ForumContract {
	/**
	 * Gets the root sections listed in descending order by weight.
	 *
	 * @return array
	 */
	public function index() {
		$sectionClass = Config::get("forum::sections.model");
		return $sectionClass::where("parent_id", "<", 1)->orderBy("weight", "desc")->get();
	}
}
