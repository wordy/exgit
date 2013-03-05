<?php
App::uses('Plan', 'Model');

/**
 * Plan Test Case
 *
 */
class PlanTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.plan',
		'app.group',
		'app.events_group',
		'app.event',
		'app.events_team',
		'app.pri_team',
		'app.sec_team',
		'app.etype'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Plan = ClassRegistry::init('Plan');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Plan);

		parent::tearDown();
	}

}
