<?php
App::uses('EventsGroup', 'Model');

/**
 * EventsGroup Test Case
 *
 */
class EventsGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.events_group',
		'app.event',
		'app.etype',
		'app.plan',
		'app.group',
		'app.prigroup',
		'app.secgroup'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventsGroup = ClassRegistry::init('EventsGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventsGroup);

		parent::tearDown();
	}

}
