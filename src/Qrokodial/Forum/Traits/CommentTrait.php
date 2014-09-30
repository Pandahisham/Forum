<?php namespace Qrokodial\Forum\Traits;

use Forum;

trait CommentTrait {
	/**
	 * Gets the unique ID of this comment.
	 *
	 * @return int
	 */
	public function getID() {
		return $this->id;
	}

	/**
	 * Gets the raw content that the user inputted to make this comment.
	 *
	 * @return string
	 */
	public function getRawContent() {
		return $this->content;
	}

	/**
	 * Gets the HTML-equivelant of the raw content after it was processed by a parser such as Markdown.
	 *
	 * @return string
	 */
	public function getDisplayContent() {
		return $this->display_content;
	}

	/**
	 * Gets the Laravel relationship of the user that created this comment.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function user() {
		return $this->belongsTo(Forum::getUserClass(), "user_id");
	}
}
