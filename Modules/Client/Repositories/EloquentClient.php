<?php
namespace Modules\Client\Repositories;

use Modules\Client\Entities\Client;
use Modules\Client\Entities\ClientPermission;
use Modules\Permission\Entities\Permission;
use Modules\Auth\Entities\User;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Lang;


/**
* 
*/
class EloquentClient implements ClientRepository
{
	private $client;
	private $clientPermission;
	private $appPermission;
	private $user;

	public function __construct(Client $client,Permission $permission, ClientPermission $clientPermission, User $user)
	{
		$this->client = $client;
		$this->clientPermission = $clientPermission;
		$this->permission = $permission;
		$this->user = $user;
	}

	public function getAll(){
		//return $this->client->all();
		$clients = DB::table('users')
					->join('clients','users.client_id','=','clients.id')
					->where('users.user_type','=','client')
					->select('clients.*','users.name','users.email','users.password')
					->get();
		return $clients;
	}

	public function getById($id){
		return $this->client->where('id',$id)->first();
	}

	public function create(array $attributes){
		$attributes['slag']=str_replace(' ', '', strtolower($attributes['client_name']));
		return $this->client->create($attributes);
	}

	public function update($id,array $attributes){
		$attributes['slag']=str_replace(' ', '', strtolower($attributes['client_name']));
		return $this->client->findorfail($id)->update($attributes);
	}	

	public function delete($id){
		return $this->client->findorfail($id)->delete();
	}
	public function authMeLogin(array $attributes){
		if (Auth::attempt(['email' => $attributes['email'], 'password' => $attributes['password']])) {
            return true;
        }
        return false;	
	}
	public function authMe(array $attributes){
		$client = DB::table('clients')
					->join('users','users.client_id','=','clients.id')
					->where('users.user_type','=','client')
					->where('users.email','=',$attributes['email'])
					->where('users.password','=',$attributes['password'])
					->select('clients.*','users.name','users.email','users.password')
					->get();
			if(count($client)>0){
				return true;
			}else{
				return false;
			}
		
	}
	public function getClient(array $attributes){
		$client = DB::table('clients')
					->join('users','users.client_id','=','clients.id')
					->where('users.user_type','=','client')
					->where('users.email','=',$attributes['email'])
					->select('clients.*','users.name','users.email','users.password')
					->first();
			if(count($client)>0){
				return $client;
			}else{
				return false;
			}
		
	}

///client permission section--------------------------------------------------------
	public function givePermission($id,array $attributes){
			foreach($attributes['check_list'] as $check) {
				if(!$this->checkAlready($id,$check)){
					$input['client_id'] = $id;
		        	$input['permission_id'] = $check;
		        	$this->clientPermission->create($input);
				}
	        }
        return true;
	}

	public function getPermissionByClientId($id){
		$permissions = DB::table('permissions')
						->join('client_permissions','client_permissions.permission_id','=','permissions.id')
						->where('client_permissions.client_id','=',$id)
						->select('client_permissions.id','permissions.name')
						->get();

		return $permissions;
	}

	public function removePermission($id,array $attributes){

		foreach($attributes['check_list1'] as $check) {
			$this->clientPermission->where('id',$check)->delete();
		}
		return true;
	}


	function getNotGrantedPermissions($client_id){
		//return $client_id;
		$permissions_already = $this->clientPermission->where('client_id',$client_id)->select('permission_id')->get();
		//return $permissions_already;
		$permission_id =array();
		foreach($permissions_already as $pa){
			array_push($permission_id, $pa['permission_id']);
		}

		$permission = $this->permission->whereNotIn('id', $permission_id)->get();
		/*$permissions = DB::table('permissions')
						->join('client_permission','client_permission.permission_id','=','permissions.id')
						->where('client_permission.client_id','!=',$client_id)
						->select('permissions.id','permissions.name')
						->get();*/

		return $permission;
	}

	private function checkAlready($client_id,$permission_id){
		$permission = $this->clientPermission->where('client_id',$client_id)->where('permission_id',$permission_id)->get();
		if(count($permission)>0){
			return true;
		}
		else{
			return false;
		}
	}

	public function getClientBySlag($slag){
		$client = DB::table('clients')
					->join('users','users.client_id','=','clients.id')
					->where('users.user_type','=','client')
					->where('clients.slag','=',$slag)
					->select('clients.*','users.name','users.email','users.password')
					->get();
		return $client;
		//return $this->client->where('slag','=',$slag)->first();	
	}


}
