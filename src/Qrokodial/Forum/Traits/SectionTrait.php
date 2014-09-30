<?php namespace Qrokodial\Forum\Traits;

use Forum;

trait SectionTrait {
	/**
	 * Gets the unique ID.
	 *
	 * @return int
	 */
	public function getID() {
		return $this->id;
	}

	/**
	 * Gets the title of the section.
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Gets the short description of the section.
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Gets the weight used to sort sections.
	 *
	 * @return int
	 */
	public function getWeight() {
		return $this->weight;
	}

	/**
	 * Returns true if this section has a parent section, false otherwise.
	 *
	 * @return bool
	 */
	public function hasParent() {
		return $this->parent()->count() == 1;
	}

	/**
	 * Gets the Laravel Eloquent relationship of the section's parent.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function parent() {
		return $this->hasOne(Forum::getSectionClass(), "parent_id");
	}

	/**
	 * Returns true if this section has children sections, false otherwise.
	 *
	 * @return bool
	 */
	public function hasChildren() {
		return $this->children()->count() > 0;
	}

	/**
	 * Gets the Laravel Eloquent relationship of the section's children, ordered by weight in descending order.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function children() {
		return $this->hasMany(Forum::getSectionClass(), "parent_id")->orderBy("weight", "desc");
	}

	/**
	 * Creates a child section with its parent being this section. Returns the newly created section.
	 *
	 * @param string $title The title of the new section
	 * @param string $description A short description of the new section
	 * @param int $weight How to order this section (higher weights get ordered last)
	 * @return mixed
	 */
	public function createChild($title, $description = "", $weight = 0) {
		return parent::create([
			"parent_id"	  => $this->getID(),
			"title"		  => $title,
			"description" => $description,
			"weight"	  => $weight
		]);
	}

	/**
	 * Returns true if this section has topics, false otherwise.
	 *
	 * @return bool
	 */
	public function hasTopics() {
		return $this->topics()->count() > 0;
	}

	/**
	 * Gets the Laravel Eloquent relationship of the topics in this section, ordered by ID in descending order.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function topics() {
		return $this->hasMany(Forum::getTopicClass(), "section_id")->orderBy("id", "desc");
	}

	/**
	 * Gets the Laravel Eloquent relationship of the topics in this section with the pinned ones first. Results are
	 * ordered by ID in descending order.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function topicsPinnedFirst() {
		return $this->hasMany(Forum::getTopicClass(), "section_id")->orderBy("is_pinned", "desc")->orderBy("id", "desc");
	}

	/**
	 * Gets the first of topics listed in descending order, or null if no topics exist.
	 *
	 * @return mixed
	 */
	public function firstTopic() {
		return $this->topics()->first();
	}

	/**
	 * Gets the first of topics listed in ascending order, or null if no topics exist.
	 *
	 * @return mixed
	 */
	public function lastTopic() {
		return $this->topics()->orderBy("id", "asc")->first();
	}

	/**
	 * Creates a topic in the section. Returns the newly created topic.
	 *
	 * @param $user
	 * @param $title
	 * @param $content
	 * @return mixed
	 */
	public function createTopic($user, $title, $content) {
		$topic = parent::create([
			"section_id"	=> $this->getID(),
			"title"			=> $title
		]);

		$topic->createComment($user, $content);

		return $topic;
	}
}
