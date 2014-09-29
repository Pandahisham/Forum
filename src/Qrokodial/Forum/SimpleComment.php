<?php namespace Qrokodial\Forum;

use Qrokodial\Forum\Contract\CommentContract;
use Qrokodial\Forum\Traits\CommentTrait;

class SimpleComment implements CommentContract {
	use CommentTrait;

	protected $table = "comments";

	/**
	 * When the content attribute is set, it automatically parses and sets the display_content attribute.
	 *
	 * @param $content
	 */
	public function setContentAttribute($content) {
		$parserClass = Config::get("forum::comments.parser");
		$this->attributes["content"] = $content;
		$this->display_content = with(new $parserClass)->parse($content);
	}
}
