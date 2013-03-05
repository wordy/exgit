<?php
App::uses('EventsTeam', 'Model');

/**
 * EventsTeam Test Case
 *
 */
class EventsTeamTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.events_team',
		'app.event',
		'app.plan',
		'app.group',
		'app.events_group',
		'app.etype',
		'app.pri_team',
		'app.sec_team'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventsTeam = ClassRegistry::init('EventsTeam');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventsTeam);

		parent::tearDown();
	}

}
