<?php

namespace SOB;

class Configuration
	{
	/**
	 * @param array<string,string|int> $config
	 */
	public function __construct(private array $config, private int $iterations)
		{
		}

	public function getDatabase() : string
		{
		if (! empty($this->config['dbname']))
			{
			return $this->config['dbname'];
			}

		$database = $this->getNamespace();

		if ('sqlite' == $this->getDriver())
			{
			$database .= '.sqlite';
			}

		return $database;
		}

	public function getDescription() : string
		{
		return $this->config['description'] ?? $this->getPDOConnectionString();
		}

	public function getDriver() : string
		{
		return $this->config['driver'] ?? 'sqlite';
		}

	public function getHost() : string
		{
		return $this->config['host'] ?? 'localhost';
		}

	public function getIterations() : int
		{
		return $this->iterations;
		}

	public function getNamespace() : string
		{
		return $this->config['namespace'] ?? 'PHPFUI';
		}

	public function getPassword() : string
		{
		return $this->config['password'] ?? '';
		}

	public function getPDOConnectionString() : string
		{
		$driver = $this->getDriver();

		if ('sqlite' == $driver)
			{
			$driver .= ':' . $this->getDatabase();
			}
		else
			{
			$driver .= ':host=' . $this->getHost() . ';dbname=' . $this->getDatabase() . ';port=' . $this->getPort();
			}

		return $driver;
		}

	public function getPort() : int
		{
		return $this->config['port'] ?? 3306;
		}

	public function getUser() : string
		{
		return $this->config['user'] ?? 'root';
		}
	}
