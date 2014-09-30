<?php namespace Qrokodial\Forum;

use Qrokodial\Forum\Contract\ForumContract;

class Forum implements ForumContract {
	protected $config;

	public function __construct($config) {
		$this->config = $config;
	}

	/**
	 * Gets the root sections listed in descending order by weight.
	 *
	 * @return array
	 */
	public function index() {
		$sectionClass = $this->getSectionClass();
		return $sectionClass::where("parent_id", "<", 1)->orderBy("weight", "desc")->get();
	}

	/**
	 * Gets the name of the section class that is specified in the config.
	 *
	 * @return string
	 */
	public function getSectionClass() {
		return $this->config->get("forum::sections.model");
	}

	/**
	 * Gets the name of the topic class that is specified in the config.
	 *
	 * @return string
	 */
	public function getTopicClass() {
		return $this->config->get("forum::topics.model");
	}

	/**
	 * Gets the name of the comment class that is specified in the config.
	 *
	 * @return string
	 */
	public function getCommentClass() {
		return $this->config->get("forum::comments.model");
	}

	/**
	 * Gets the name of the parser class that is specified in the config.
	 *
	 * @return string
	 */
	public function getParserClass() {
		return $this->config->get("forum::comments.parser");
	}

	/**
	 * Gets the name of the user class that is specified in the config.
	 *
	 * @return string
	 */
	public function getUserClass() {
		return $this->config->get("forum::users.model");
	}
}
