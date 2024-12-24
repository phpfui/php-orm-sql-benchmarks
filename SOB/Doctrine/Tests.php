<?php

namespace SOB\Doctrine;

use SOB\Doctrine\Entity\Employee;

class Tests extends \SOB\Test
	{
	protected \Doctrine\ORM\EntityManager $entityManager;

	public function closeConnection() : void
		{
		unset($this->entityManager);
		}

	/**
	 * class must delete one record with id=$id
	 */
	public function delete(int $id) : bool
		{
		$this->entityManager->remove($this->read($id));
		$this->entityManager->flush();

		return true;
		}

	/**
	 * Initialize Responsibilities:
	 *
	 *  * Initialize the orm
	 *  * open the database
	 *  * initialize the database schema
	 */
	public function init(\SOB\Configuration $config) : static
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
		$database = $config->getDatabase();
		$settings = [
			'driver' => 'pdo_' . $config->getDriver(),
			'host' => $config->getHost(),
//			'path' => $config->getDatabase(),
			'user'     => $config->getUser(),
			'password' => $config->getPassword(),
	//		'dbname'   => $config->getDatabase(),
			'charset' => 'utf8',
			'port' => $config->getPort(),
			];
		$database = $config->getDatabase();
		if ($database == ':memory:')
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

		if (\str_contains($config->getDriver(), 'sqlite'))
				{
				$lines = \file(__DIR__ . '/../../northwind/northwind-schema.sqlite');
				\fclose(\fopen($config->getNamespace() . '.sqlite', 'w'));
				}
			else
				{
				$lines = \file(__DIR__ . '/../../northwind/northwind-schema.sql');
				}

		$sql = '';
		$conn = $this->entityManager->getConnection();

		foreach ($lines as $line)
			{
			// Ignoring comments from the SQL script
			if (\str_starts_with((string)$line, '--') || \str_starts_with((string)$line, '#') || '' == $line)
				{
				continue;
				}

			$sql .= $line;

			if (\str_ends_with(\trim((string)$line), ';'))
				{
				$conn->executeUpdate($sql);
				$sql = '';
				}
			} // end foreach

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
		$this->entityManager->flush();

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

		$this->entityManager->flush();

		return true;
		}
	}
