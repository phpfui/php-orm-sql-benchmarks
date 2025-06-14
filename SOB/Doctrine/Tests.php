<?php

namespace SOB\Doctrine;

use SOB\Doctrine\Entity\Employee;

class Tests extends \SOB\Test
	{
	protected ?\Doctrine\ORM\EntityManager $entityManager;

	public function closeConnection() : void
		{
		$this->entityManager = null;
		}

	/**
	 * class must delete one record with id=$id
	 */
	public function delete(int $id) : bool
		{
		$this->entityManager->remove($this->read($id));
		$this->flush();

		return true;
		}

	public function flush() : void
		{
		$this->entityManager->flush();
		}

	/**
	 * Initialize the orm
	 *
	 * @param array<string> $lines sql to import into schema
	 */
	public function init(\SOB\Configuration $config, array $lines, \SOB\BaseLine $runTimer) : static
		{
		$queryCache = new \Symfony\Component\Cache\Adapter\ArrayAdapter();
		$metadataCache = new \Symfony\Component\Cache\Adapter\ArrayAdapter();

		$doctrineConfig = new \Doctrine\ORM\Configuration();
		$doctrineConfig->setMetadataCache($metadataCache);
		$entityPath = __DIR__ . '/Entity';
		$driverImpl = new \Doctrine\ORM\Mapping\Driver\AttributeDriver([$entityPath], true);
		$doctrineConfig->setMetadataDriverImpl($driverImpl);
		$doctrineConfig->setQueryCache($queryCache);
		$doctrineConfig->setProxyDir(__DIR__ . '/Proxy');
		$doctrineConfig->setProxyNamespace('SOB\Doctrine\Proxy');
		$doctrineConfig->setAutoGenerateProxyClasses(true);

		// configuring the database connection
		$settings = [
			'driver' => 'pdo_' . $config->getDriver(),
			'host' => $config->getHost(),
			'user' => $config->getUser(),
			'password' => $config->getPassword(),
			'charset' => 'utf8',
			'port' => $config->getPort(),
		];
		$database = $config->getDatabase();

		if (':memory:' == $database)
			{
			$settings['memory'] = true;
			}
		else
			{
			$settings['dbname'] = $database;
			}

		$connection = \Doctrine\DBAL\DriverManager::getConnection($settings, $doctrineConfig);

		// obtaining the entity manager
		$this->entityManager = new \Doctrine\ORM\EntityManager($connection, $doctrineConfig);
		$callback = [$connection, 'executeQuery'];

		$this->loadSchema($lines, $callback, $runTimer);

		return $this;
		}

	/**
	 * class must insert one record with id=$id
	 *
	 * @return int $id inserted
	 */
	public function insert(int $id) : int
		{
		$employee = new Employee();
		$employee->employee_id = $id;
		$employee->company = "Company {$id}";
		$employee->last_name = "Last {$id}";
		$employee->first_name = "First {$id}";
		$this->entityManager->persist($employee);
		$this->flush();

		return $employee->employee_id;
		}

	/**
	 * class must read and return one record with id=$id or null on no matching record
	 */
	public function read(int $id) : ?object
		{
		return $this->entityManager->find(Employee::class, $id);
		}

	/**
	 * class must update one record with id=$id to have $to in the data
	 */
	public function update(int $id, int $to) : bool
		{
		$employee = $this->read($id);

		$employee->last_name = "Updated {$to}";

		$this->entityManager->persist($employee);

		$this->flush();

		return true;
		}
	}
