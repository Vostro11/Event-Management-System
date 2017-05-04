<?php 
namespace Modules\Event\Repositories;

interface EventstaffRepository {

	function getAllEventstaff();

	function getEventstaffById($id);

	function createEventstaff(array $attributes);

	function updateEventstaff($id, array $attributes);

	function deleteEventstaff($id);

}
