<?php

namespace SOB;

/**
 * @implements \Iterator<int, \SOB\Configuration>
 */
class Configurations implements \Countable, \Iterator
	{
	private int $iterations = 5000;

	private array $parameters = [];	// @phpstan-ignore-line

	private bool $valid = true;

	public function __construct(string $configFile)
		{
		$this->parameters = [];

		if (\file_exists($configFile))
			{
			$this->parameters = include $configFile;

			if (! \is_array($this->parameters))
				{
				$this->parameters = [];
				}
			}

		if (empty($this->parameters['tests']))
			{
			$source = __DIR__;
			$iterator = new \RecursiveIteratorIterator(
				new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS),
				\RecursiveIteratorIterator::SELF_FIRST
			);

			foreach ($iterator as $item)
				{
				if ($item->isFile() && 'Tests.php' == $item->getFilename())
					{
					$fileName = \str_replace('\\', '/', $item->getPathname());
					$parts = \explode('/', $fileName);

					while ('SOB' != \array_shift($parts))
						{
						}
					$this->parameters['tests'][] = ['namespace' => $parts[0], 'description' => 'sqlite::memory:', 'dbname' => ':memory:', ];
					$this->parameters['tests'][] = ['namespace' => $parts[0], 'description' => 'sqlite file', ];
					}
				}
			}

		$this->iterations = $this->parameters['iterations'] ?? 5000;
		$this->rewind();
		}

	public function count() : int
		{
		return \count($this->parameters['tests'] ?? []);
		}

	public function current() : \SOB\Configuration
		{
		return new \SOB\Configuration(\current($this->parameters['tests']), $this->iterations);
		}

	public function getIterations() : int
		{
		return $this->iterations;
		}

	public function key() : int
		{
		return \key($this->parameters['tests']);
		}

	public function next() : void
		{
		$this->valid = false !== \next($this->parameters['tests']);
		}

	public function rewind() : void
		{
		$this->valid = false !== \reset($this->parameters['tests']);
		}

	public function valid() : bool
		{
		return $this->valid;
		}
	}
