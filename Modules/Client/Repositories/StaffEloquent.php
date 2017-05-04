<?php 
namespace Modules\Client\Repositories;

use Modules\Client\Entities\ClientStaff;
use DB;

class StaffEloquent implements StaffRepository{
	private $client_staff;

	public function __construct(ClientStaff $client_staff){
		$this->client_staff = $client_staff;
	}
	public function getAllClientStaff(){
		return $this->client_staff->all();
	}

	public function getClientStaffById($id){
		return $this->client_staff->findorfail($id);
	}

	public function createClientStaff(array $attributes){
		return $this->client_staff->create($attributes);
	}

	public function updateClientStaff($id,array $attributes){
		return $this->client_staff->findorfail($id)->update($attributes);
	}

	public function deleteClientStaff($id){
		return $this->client_staff->findorfail($id)->delete();
	}

	public function getStaffByClientId($client_id){
		/*$staffs = DB::table('users')
			->join('client_staffs','users.id','=','client_staffs.user_id')
			->where('client_staffs.client_id','=',$client_id)
			->select('client_staffs.*','users.*')
			->get();*/
		$staffs = $this->client_staff->where('client_id',$client_id)->get();
		return $staffs;
	}

}