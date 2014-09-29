<?php namespace Qrokodial\Forum\Contract;

interface ParserContract {
	/**
	 * Parses input and produces a processed output.
	 *
	 * @param string $content
	 * @return string
	 */
	public function parse($content);
} 