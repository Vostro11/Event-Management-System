<?php
namespace Modules\Event\Repositories;

interface EventRepository {

	function getAll();

	function getById($id);

	function create(array $attributes);

	function update($id,array $attributes);

	function delete($id);

	//partners

	function store_partner(array $attributes);

	function getAll_partner_byEvent_id($event_id);

	function delete_partner($id);

	//Ticket

	function store_ticket(array $attributes);

	function getAll_ticket_byEvent_id($event_id);

	function delete_ticket($id);

	//image

	function store_image(array $attributes);

	function getAll_image_byEvent_id($event_id);

	function delete_image($id);

	function change_status_of_image($id,$event_id);

	

	//api

	function apiGetEventByClientId($client_id);

	//form assign
	function assign_form($attributes);

	function getAssignedForm($event_id);

	function is_assignd($event_id,$form_id);

	function change_status_of_assigned_form($id);

	function delete_form($id);

	//categories
	function getAllCategoriesByEventId($event_id);
	function getCategoriesByParentId($parent_id);
	function deleteEventCategory($category_id);
	
}