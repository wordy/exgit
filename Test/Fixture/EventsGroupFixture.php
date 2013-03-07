<?php
/**
 * EventsGroupFixture
 *
 */
class EventsGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'event_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'prigroup_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'secgroup_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'linked_eventsgroup_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
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
			'prigroup_id' => 1,
			'secgroup_id' => 1,
			'linked_eventsgroup_id' => 1,
			'etype_id' => 1,
			'active' => 1
		),
	);

}
