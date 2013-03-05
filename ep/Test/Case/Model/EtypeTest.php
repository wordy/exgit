<?php
App::uses('Etype', 'Model');

/**
 * Etype Test Case
 *
 */
class EtypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.etype',
		'app.events_team'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Etype = ClassRegistry::init('Etype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Etype);

		parent::tearDown();
	}

}
