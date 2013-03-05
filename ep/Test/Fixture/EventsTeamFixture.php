<?php
/**
 * EventsTeamFixture
 *
 */
class EventsTeamFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'event_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'pri_team_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'sec_team_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'linked_event_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'etype_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'event_id' => 1,
			'pri_team_id' => 1,
			'sec_team_id' => 1,
			'linked_event_id' => 1,
			'etype_id' => 1,
			'active' => 1
		),
	);

}
