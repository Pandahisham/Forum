<?php namespace Qrokodial\Forum\Contract;

/**
 * Lays out the basic flow of sections.
 *
 * @package Qrokodial\Forum\Contract
 */
interface SectionContract {
	/**
	 * Gets the unique ID.
	 *
	 * @return int
	 */
	public function getID();

	/**
	 * Gets the title of the section.
	 *
	 * @return string
	 */
	public function getTitle();

	/**
	 * Gets the short description of the section.
	 *
	 * @return string
	 */
	public function getDescription();

	/**
	 * Gets the weight used to sort sections.
	 *
	 * @return int
	 */
	public function getWeight();

	/**
	 * Returns true if this section has a parent section, false otherwise.
	 *
	 * @return bool
	 */
	public function hasParent();

	/**
	 * Gets the Laravel Eloquent relationship of the section's parent.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function parent();

	/**
	 * Returns true if this section has children sections, false otherwise.
	 *
	 * @return bool
	 */
	public function hasChildren();

	/**
	 * Gets the Laravel Eloquent relationship of the section's children, ordered by weight in descending order.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function children();

	/**
	 * Creates a child section with its parent being this section. Returns the newly created section.
	 *
	 * @param string $title The title of the new section
	 * @param string $description A short description of the new section
	 * @param int	 $weight How to order this section (higher weights get ordered last)
	 * @return mixed
	 */
	public function createChild($title, $description = "", $weight = 0);

	/**
	 * Returns true if this section has topics, false otherwise.
	 *
	 * @return bool
	 */
	public function hasTopics();

	/**
	 * Gets the Laravel Eloquent relationship of the topics in this section, ordered by ID in descending order.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function topics();

	/**
	 * Gets the Laravel Eloquent relationship of the topics in this section with the pinned ones first. Results are
	 * ordered by ID in descending order.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\Relation
	 */
	public function topicsPinnedFirst();

	/**
	 * Gets the first of topics listed in descending order, or null if no topics exist.
	 *
	 * @return mixed
	 */
	public function firstTopic();

	/**
	 * Gets the first of topics listed in ascending order, or null if no topics exist.
	 *
	 * @return mixed
	 */
	public function lastTopic();

	/**
	 * Creates a topic in the section. Returns the newly created topic.
	 *
	 * @param $user
	 * @param $title
	 * @param $content
	 * @return mixed
	 */
	public function createTopic($user, $title, $content);
}
