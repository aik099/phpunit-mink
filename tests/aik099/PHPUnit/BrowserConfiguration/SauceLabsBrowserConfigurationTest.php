<?php
/**
 * This file is part of the phpunit-mink library.
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @copyright Alexander Obuhovich <aik.bold@gmail.com>
 * @link      https://github.com/aik099/phpunit-mink
 */

namespace tests\aik099\PHPUnit\BrowserConfiguration;


use Mockery as m;

class SauceLabsBrowserConfigurationTest extends ApiBrowserConfigurationTestCase
{

	const HOST = ':@ondemand.saucelabs.com';

	/**
	 * Configures all tests.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		$this->browserConfigurationClass = 'aik099\\PHPUnit\\BrowserConfiguration\\SauceLabsBrowserConfiguration';

		parent::setUp();

		$this->setup['host'] = 'UN:AK@ondemand.saucelabs.com';
	}

	/**
	 * Test description.
	 *
	 * @return void
	 */
	public function testSetHostCorrect()
	{
		$browser = $this->createBrowserConfiguration(array(), false, true);

		$this->assertSame($browser, $browser->setHost('EXAMPLE_HOST'));
		$this->assertSame('A:B@ondemand.saucelabs.com', $browser->getHost());
	}

	/**
	 * Desired capability data provider.
	 *
	 * @return array
	 */
	public function desiredCapabilitiesDataProvider()
	{
		return array(
			array(
				array('platform' => 'pl1'),
				array('platform' => 'pl1', 'version' => ''),
			),
			array(
				array('version' => 'ver1'),
				array('version' => 'ver1', 'platform' => 'Windows XP'),
			),
		);
	}

}
