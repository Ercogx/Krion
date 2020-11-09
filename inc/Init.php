<?php

namespace Inc;

final class Init
{
	public function __construct() {
		$this->registerServices();
	}

	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
	public function getServices()
	{
		return [
			Pages\Dashboard::class,
            Base\Enqueue::class
		];
	}

	/**
	 * Loop through the classes, initialize them,
	 * and call the register() method if it exists
	 * @return void
	 */
	public function registerServices()
	{
		foreach ($this->getServices() as $class) {
			$service = $this->instantiate($class);
			if (method_exists($service, 'register')) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
	private function instantiate($class)
	{
        return new $class();

	}
}
