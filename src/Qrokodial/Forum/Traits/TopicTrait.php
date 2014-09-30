<?php namespace Qrokodial\Forum\Traits;

use Forum;

trait TopicTrait {
	/**
	 * Gets the unique ID.
	 *
	 * @return int
	 */
	public function getID() {
		return $this->id;
	}

	/**
	 * Gets the title of the topic.
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Returns true if the topic is pinned, false otherwise.
	 *
	 * @return bool
	 */
	public function isPinned() {
		return $this->is_pinned;
	}

	/**
	 * Returns true if the topic is locked, false otherwise.
	 *
	 * @return bool
	 */
	public function isLocked() {
		return $this->is_locked;
	}

	/**
	 * Gets the Laravel relationship of the user that created this thread.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function user() {
		return $this->firstComment()->user();
	}

	/**
	 * Gets the section that this topic is in.
	 *
	 * @return mixed
	 */
	public function section() {
		return $this->belongsTo(Forum::getSectionClass(), "section_id");
	}

	/**
	 * Gets the Laravel relationship of the comments in this thread, listed by descending ID.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function comments() {
		return $this->hasMany(Forum::getCommentClass(), "topic_id")->orderBy("id", "desc");
	}

	/**
	 * Gets the first comment of this thread.  It is usually the one submitted by the thread's creator.
	 *
	 * @return mixed
	 */
	public function firstComment() {
		return $this->comments()->first();
	}

	/**
	 * Gets the latest comment created in this thread.
	 *
	 * @return mixed
	 */
	public function lastComment() {
		return $this->comments()->orderBy("id", "asc")->first();
	}

	/**
	 * Creates a comment in this thread.
	 *
	 * @param $user
	 * @param $content
	 * @return mixed
	 */
	public function createComment($user, $content) {
		return parent::create([
			"topic_id"	=> $this->getID(),
			"user_id"	=> $user->id,
			"content"	=> $content
		]);
	}
}
