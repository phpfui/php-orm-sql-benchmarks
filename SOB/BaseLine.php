<?php

namespace SOB;

class BaseLine
	{
	private int $memory = 0;

	private \SebastianBergmann\Timer\Timer $timer;

	public function __construct()
		{
		$this->memory = \memory_get_usage();
		$this->timer = new \SebastianBergmann\Timer\Timer();
		$this->timer->start();
		}

	public function getMemory() : int
		{
		return \memory_get_usage() - $this->memory;
		}

	public function stop() : float
		{
		return $this->timer->stop()->asSeconds();
		}
	}
