<?php namespace Qrokodial\Forum\Contract;

interface TopicContract {
	/**
	 * Gets the unique ID.
	 *
	 * @return int
	 */
	public function getID();

	/**
	 * Gets the title of the topic.
	 *
	 * @return string
	 */
	public function getTitle();

	/**
	 * Returns true if the topic is pinned, false otherwise.
	 *
	 * @return bool
	 */
	public function isPinned();

	/**
	 * Returns true if the topic is locked, false otherwise.
	 *
	 * @return bool
	 */
	public function isLocked();

	/**
	 * Gets the user that created this topic.
	 *
	 * @return mixed
	 */
	public function user();

	/**
	 * Gets the section that this topic is in.
	 *
	 * @return mixed
	 */
	public function section();

	/**
	 * Gets the Laravel relationship of the comments in this thread, listed by descending ID.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function comments();

	/**
	 * Gets the first comment of this thread.  It is usually the one submitted by the thread's creator.
	 *
	 * @return mixed
	 */
	public function firstComment();

	/**
	 * Gets the latest comment created in this thread.
	 *
	 * @return mixed
	 */
	public function lastComment();

	/**
	 * Creates a comment in this thread.
	 *
	 * @param $user The user object
	 * @param $content The content of this comment
	 * @return mixed
	 */
	public function createComment($user, $content);
}
