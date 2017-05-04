<?php 
namespace Modules\Event\Repositories;

interface EventsettingRepository {

	function getAllEventsetting();

	function getEventsettingById($id);

	function createEventsetting(array $attributes);

	function updateEventsetting($id, array $attributes);

	function deleteEventsetting($id);

}
