<?php

return [
	"users" => [
		"model" => "\App\User",
	],

	"sections" => [
		"model" => "\Qrokodial\Forum\SimpleSection",
	],

	"topics" => [
		"model" => "\Qrokodial\Forum\SimpleTopic",
	],

	"comments" => [
		"model"		=> "\Qrokodial\Forum\SimpleComment",
		"parser"	=> "\Qrokodial\Forum\DoNothingParser",
	],
];