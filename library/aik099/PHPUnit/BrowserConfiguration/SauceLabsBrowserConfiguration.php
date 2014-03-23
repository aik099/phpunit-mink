<?php
/**
 * This file is part of the phpunit-mink library.
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @copyright Alexander Obuhovich <aik.bold@gmail.com>
 * @link      https://github.com/aik099/phpunit-mink
 */

namespace aik099\PHPUnit\BrowserConfiguration;


use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Browser configuration tailored to use with "Sauce Labs" service.
 *
 * @link https://saucelabs.com/php
 */
class SauceLabsBrowserConfiguration extends ApiBrowserConfiguration
{

	/**
	 * Creates browser configuration.
	 *
	 * @param EventDispatcherInterface     $event_dispatcher              Event dispatcher.
	 * @param IBrowserConfigurationFactory $browser_configuration_factory Browser configuration factory.
	 */
	public function __construct(
		EventDispatcherInterface $event_dispatcher,
		IBrowserConfigurationFactory $browser_configuration_factory
	)
	{
		$this->defaultParameters['type'] = 'saucelabs';

		parent::__construct($event_dispatcher, $browser_configuration_factory);
	}

	/**
	 * Returns hostname from browser configuration.
	 *
	 * @return string
	 */
	public function getHost()
	{
		return $this->getApiUsername() . ':' . $this->getApiKey() . '@ondemand.saucelabs.com';
	}

	/**
	 * Returns desired capabilities from browser configuration.
	 *
	 * @return array
	 */
	public function getDesiredCapabilities()
	{
		$capabilities = parent::getDesiredCapabilities();

		if ( !isset($capabilities['platform']) ) {
			$capabilities['platform'] = 'Windows XP';
		}

		if ( !isset($capabilities['version']) ) {
			$capabilities['version'] = '';
		}

		return $capabilities;
	}

}
