<?php 
namespace Modules\Client\Repositories;

interface StaffRepository {

	function getAllClientStaff();

	function getClientStaffById($id);

	function createClientStaff(array $attributes);

	function updateClientStaff($id, array $attributes);

	function deleteClientStaff($id);

}
