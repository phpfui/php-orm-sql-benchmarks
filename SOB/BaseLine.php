<?php

namespace SOB;

class BaseLine
	{
	private int $memory = 0;

	private int $pauseMemory = 0;

	private float $pauseSeconds = 0.0;

	private \SebastianBergmann\Timer\Timer $pauseTimer;

	private \SebastianBergmann\Timer\Timer $timer;

	public function __construct()
		{
		$this->memory = \memory_get_usage();
		$this->timer = new \SebastianBergmann\Timer\Timer();
		$this->timer->start();
		}

	public function getMemory() : int
		{
		return \memory_get_usage() - $this->memory - $this->pauseMemory;
		}

	public function pause() : static
		{
		$this->pauseMemory = \memory_get_usage();
		$this->pauseTimer = new \SebastianBergmann\Timer\Timer();
		$this->pauseTimer->start();

		return $this;
		}

	public function resume() : static
		{
		$this->pauseSeconds += $this->pauseTimer->stop()->asSeconds();
		$this->pauseMemory = \memory_get_usage() - $this->pauseMemory;

		return $this;
		}

	public function stop() : float
		{
		return $this->timer->stop()->asSeconds() - $this->pauseSeconds;
		}
	}
