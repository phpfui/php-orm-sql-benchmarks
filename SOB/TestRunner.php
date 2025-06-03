<?php

namespace SOB;

class TestRunner
	{
	/**
	 * @var array<string,mixed>
	 */
	private array $currentResults = [];

	/**
	 * @var array<int>
	 */
	private array $random = [];

	/**
	 * @var array<array<string,mixed>>
	 */
	private array $results = [];

	private int $updateOffset = 0;

	public function __construct(private \SOB\Configurations $configurations)
		{
		$iterations = $configurations->getIterations();
		$this->updateOffset = \random_int($iterations + 1, $iterations * 3000);
		$count = (int)($iterations / 10);

		for ($i = 0; $i < $count; ++$i)
			{
			$this->random[] = \random_int(1, $iterations);
			}
		}

	/**
	 * @param array<string,mixed> $row
	 */
	public function addResults(array $row) : static
		{
		$this->results[] = $row;

		return $this;
		}

	/**
	 * @return array<array<string,mixed>>
	 */
	public function getResults() : array
		{
		return $this->results;
		}

	public function runTests() : bool
		{
		foreach ($this->configurations as $config)
			{
			$namespace = $config->getNameSpace();
			$class = "\\SOB\\{$namespace}\\Tests";
			$tester = new $class();
			$this->test($tester, $config);
			$this->addResults($this->currentResults);
			$tester->closeConnection();
			$tester = null;
			}

		return true;
		}

	private function setResult(string $test, \SOB\BaseLine $timer) : static
		{
		$duration = $timer->stop();
		$memory = $timer->getMemory();

		$this->currentResults[$test . ' Time'] = $duration;
		$this->currentResults[$test . ' Memory'] = $memory;

		return $this;
		}

	private function test(\SOB\Test $tester, \SOB\Configuration $config) : bool
		{
		// remove machine name
		$system = \php_uname();
		$host = \strtoupper(\gethostname());
		$system = \str_replace($host . ' ', '', $system);

		$this->currentResults = ['Date/Time' => \date('Y-m-d H:i:s'), 'System' => $system, 'PHP' => PHP_VERSION, 'Test' => $config->getNamespace(), 'Description' => $config->getDescription(), ];

		echo "Running {$config->getNamespace()} -> {$config->getDescription()}\n";
		$runTime = new \SOB\BaseLine();
		$start = new \SOB\BaseLine();
		$tester->init($config);
		$this->setResult('Init', $start);

		$iterations = $config->getIterations();

		$timer = new \SOB\BaseLine();

		echo "Executing insert test\n";

		$id = 0;
		for ($i = 1; $i <= $iterations; ++$i)
			{
			$newId = $tester->insert($i);
			if ($newId <= $id)
				{
				throw new \Exception('Failed to insert ' . $newId);
				}
			$id = $newId;
			}
		$tester->flush();
		$this->setResult('Insert', $timer);

		$timer = new \SOB\BaseLine();

		echo "Executing update test\n";

		for ($i = 1; $i <= $iterations; ++$i)
			{
			$tester->testUpdate($tester->read($i), "Last {$i}");
			}
		$tester->flush();
		$this->setResult('Read', $timer);

		$timer = new \SOB\BaseLine();

		for ($i = 1; $i <= $iterations; ++$i)
			{
			$tester->update($i, $i + $this->updateOffset);
			}
		$tester->flush();
		$this->setResult('Update', $timer);

		$timer = new \SOB\BaseLine();

		for ($i = 1; $i <= $iterations; ++$i)
			{
			$expected = $i + $this->updateOffset;
			$tester->testUpdate($tester->read($i), "Updated {$expected}");
			}
		$this->setResult('Update Test', $timer);

		$timer = new \SOB\BaseLine();

		echo "Executing random read test\n";

		foreach ($this->random as $i)
			{
			$expected = $i + $this->updateOffset;
			$tester->testUpdate($tester->read($i), "Updated {$expected}");
			}
		$this->setResult('Random Read', $timer);

		$timer = new \SOB\BaseLine();

		echo "Executing delete test\n";

		for ($i = 1; $i <= $iterations; ++$i)
			{
			$tester->delete($i);

			if ($tester->read($i))
				{
				throw new \Exception('Failed to delete ' . $i);
				}
			}
		$tester->flush();
		$this->setResult('Delete', $timer);

		$this->setResult('Total Runtime', $runTime);

		return true;
		}
	}
