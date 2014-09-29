<?php namespace Qrokodial\Forum;

use Qrokodial\Forum\Contract\ParserContract;

/**
 * The default parser that does nothing.
 *
 * @package Qrokodial\Forum
 */
class DoNothingParser implements ParserContract {
	/**
	 * Parses input and produces a processed output.
	 *
	 * @param string $content
	 * @return string
	 */
	public function parse($content) {
		return $content;
	}
}
