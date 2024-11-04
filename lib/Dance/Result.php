<?php

namespace Dance;

class Result {
	public readonly bool   $isOK;
	public readonly string $errorMessage;

	public function __construct (string $errorMessage = '') {
		$this->errorMessage = $errorMessage;
		$this->isOK         = !$this->errorMessage;
	}
}
