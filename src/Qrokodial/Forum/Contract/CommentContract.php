<?php namespace Qrokodial\Forum\Contract;

interface CommentContract {
	/**
	 * Gets the unique ID of this comment.
	 *
	 * @return int
	 */
	public function getID();

	/**
	 * Gets the raw content that the user inputted to make this comment.
	 *
	 * @return string
	 */
	public function getRawContent();

	/**
	 * Gets the HTML-equivelant of the raw content after it was processed by a parser such as Markdown.
	 *
	 * @return string
	 */
	public function getDisplayContent();

	/**
	 * Gets the Laravel relationship of the user that created this comment.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function user();
}
