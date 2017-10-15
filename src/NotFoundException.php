<?php

namespace Opportus\Container;

use Psr\Container\NotFoundExceptionInterface;

/**
 * The dependency injection container not found exception...
 *
 * @version 0.0.1
 * @package Opportus\Container
 * @author  Clément Cazaud <opportus@gmail.com>
 */
class NotFoundException extends ContainerException implements NotFoundExceptionInterface
{}

