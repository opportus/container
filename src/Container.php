<?php

namespace Opportus\Container;

use Psr\Container\ContainerInterface;

/**
 * The dependency injection container...
 *
 * @version 0.0.1
 * @package Opportus\Container
 * @author  Clément Cazaud <opportus@gmail.com>
 */
class Container implements ContainerInterface
{
	/**
	 * @var array $registry
	 */
	protected $registry = array();

	/**
	 * @var array $instances
	 */
	protected $instances = array();

	/**
	 * Sets registry entry.
	 *
	 * @param string   $id
	 * @param callable $resolver
	 */
	public function set($id, Callable $resolver)
	{
		$this->registry[$id] = $resolver;
	}

	/**
	 * Gets registry entry.
	 *
	 * @param  string $id
	 * @return mixed
	 * @throws NotFoundException
	 * @throws ContainerException
	 */
	public function get($id)
	{
		if (! isset($this->registry[$id])) {
			throw new NotFoundException('[' . __CLASS__ . '::' . __FUNCTION__ . ']: No entry was found for **' . $id . '** identifier');

		} elseif (! is_callable($this->registry[$id])) {
			throw new ContainerException('[' . __CLASS__ . '::' . __FUNCTION__ . ']: Error while retrieving the entry');

		} elseif (! isset($this->instances[$id])) {
			$this->instances[$id] = $this->registry[$id]();
		}

		return $this->instances[$id];
	}

	/**
	 * Checks if the given entry exists in the registry.
	 *
	 * @param  string $id
	 * @return bool
	 */
	public function has($id)
	{
		return isset($this->registry[$id]);
	}
}

