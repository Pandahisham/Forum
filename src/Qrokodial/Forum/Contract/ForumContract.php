<?php namespace Qrokodial\Forum\Contract;

interface ForumContract {
	/**
	 * Gets the Laravel relationship of the root sections listed in descending order by weight.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function index();

	/**
	 * Gets the name of the section class that is specified in the config.
	 *
	 * @return string
	 */
	public function getSectionClass();

	/**
	 * Gets the name of the topic class that is specified in the config.
	 *
	 * @return string
	 */
	public function getTopicClass();

	/**
	 * Gets the name of the comment class that is specified in the config.
	 *
	 * @return string
	 */
	public function getCommentClass();

	/**
	 * Gets the name of the parser class that is specified in the config.
	 *
	 * @return string
	 */
	public function getParserClass();

	/**
	 * Gets the name of the user class that is specified in the config.
	 *
	 * @return string
	 */
	public function getUserClass();
}
