<?php

namespace Opportus\Container;

use Psr\Container\ContainerExceptionInterface;

use \Exception;

/**
 * The dependency injection container exception...
 *
 * @version 0.0.1
 * @package Opportus\Container
 * @author  Clément Cazaud <opportus@gmail.com>
 */
class ContainerException extends Exception implements ContainerExceptionInterface
{}

