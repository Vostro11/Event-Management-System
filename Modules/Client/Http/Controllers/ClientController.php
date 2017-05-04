<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Client\Repositories\ClientRepository;
use Modules\Client\Repositories\StaffRepository;
use Modules\Auth\Repositories\UserRepository;
use Session;
class ClientController extends Controller
{
    private $clientRepo;
    private $userRepo;
    private $staffRepo;

    //protected $redirectTo = 'auth/home';

    public function __construct(ClientRepository $clientRepo,UserRepository $userRepo,StaffRepository $staffRepo)
    {
        $this->clientRepo = $clientRepo;
        $this->userRepo = $userRepo;
        $this->staffRepo = $staffRepo;
        $this->middleware('auth');
        $this->middleware('superadmin');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $clients =  $this->clientRepo->getAll();
        return view('client::index',compact('clients'));
    }

    public function create()
    {
        return view('client::create');
    }

    public function store(Request $request)
    {   //create client-----
        // return $request->all();
        $clientData = $request->except(['email','password']);
        $client = $this->clientRepo->create($request->all());
        if($client){
            Session::flash('success','client is created');
            //return redirect('client');
            $userData = $request->only('name','email', 'password');
            $userData['client_id'] =$client['id'];
            $userData['user_type'] ='client'; 
            $this->userRepo->register($userData);
            return redirect('client');
        }

        //create user for this client ----- 
        
        Session::flash('error','client is not created');
        return redirect('client');
    }

    public function edit($id)
    {
        $client = $this->clientRepo->getById($id);
        return view('client::edit',compact('client'));
    }

    public function update($id,Request $request){
        if($this->clientRepo->update($id,$request->all())){
            Session::flash('success','client is Updated');
            return redirect('client');
        }
        Session::flash('error','client is not Updated');
        return redirect('client');
    }

    public function delete($id){
        if($this->clientRepo->delete($id)){
            Session::flash('success','client is Deleted');
            return redirect('client');
        }
        Session::flash('error','client is not Deleted');
        return redirect('client');
    }

    public function permission($id){
        $client = $this->clientRepo->getById($id);
        $permissions = $this->clientRepo->getNotGrantedPermissions($id);
        $grantedPermissions = $this->clientRepo->getPermissionByClientId($id);

        //return $permissions;
        return view('client::permission_view',compact('client','permissions','grantedPermissions'));  
    }

    public function givePermission($id,Request $request){
        //return $request->all();
        if($this->clientRepo->givePermission($id,$request->all())){
             Session::flash('success','Permission is Granted');
        }else{
             Session::flash('error','Permission is not Denied');
        }
        //return $temp;
        return redirect()->back();
    }

    public function removePermission($id,Request $request){
        //return $request->all();
        if($this->clientRepo->removePermission($id,$request->all())){
             Session::flash('success','Permission is Removed');
        }else{
             Session::flash('error','Permission is not Removed');
        }
        return redirect()->back();
    }

    public function manageStaff($client_id){
        $staffs= $this->staffRepo->getStaffByClientId($client_id);
        //return $staffs;
        return view('client::manage-staff',compact('client_id','staffs'));
    }

    public function createStaff($client_id){
        return view('client::create-staff',compact('client_id'));
    }

    public function storeStaff(Request $request){
        $staff=array();
        $user_id=0;
        if($request['islogin']==1){
            $user = $request->only(['name','email', 'password','client_id','user_type']);
            //return $user;
            $myuser=$this->userRepo->register($user);
            //return $myuser['id'];
            $user_id= $myuser['id'];
        }

        $staff = $request->only(['name','mobile','address','status','job_description','client_id']);
        $staff['user_id']=$user_id;
        //return $staff;
        $this->staffRepo->createClientStaff($staff);
        Session::flash('success','Staff is created');
        return back();
    }

    public function editStaff($client_id,$id){
        $staff = $this->staffRepo->getClientStaffById($id);
        if($staff['user_id']!=0){
            $myuser = $this->userRepo->getById($staff['user_id']);
        }else{
            $myuser=array();
            $myuser['id']=0;
        }
        //dd($user);
        return view('client::edit-staff',compact('client_id','staff','myuser'));
    } 
    public function updateStaff($client_id,$id,Request $request){
        //return $request->all();
        $staff=array();
        $user_id=0;
        if($request['islogin']==1){
            $user = $request->only(['name','email', 'password','client_id','user_type']);
            //return $user;
            if($request['user_id']!=0){
                $myuser=$this->userRepo->update($request['user_id'],$user);
            }else{
                $myuser=$this->userRepo->register($user);
            }
            //return $myuser['id'];
            $user_id= $myuser['id'];
        }else{
            if($request['user_id']!=0){
                $this->userRepo->delete($request['user_id']);
            }
        }

        $staff = $request->only(['name','mobile','address','status','job_description','client_id']);
        $staff['user_id']=$user_id;
        //return $staff;
        $this->staffRepo->updateClientStaff($id,$staff);
        Session::flash('success','Staff is created');
        return redirect('client/manage-staff/'.$client_id);
    }  

    public function deleteStaff($client_id,$staff_id){
        $staff =$this->staffRepo->getClientStaffById($staff_id);
        if($staff['user_id']!=0){
            $this->userRepo->delete($staff['user_id']);
        }
        $this->staffRepo->deleteClientStaff($staff_id);
        Session::flash('success','Staff is deleted');
        return redirect('client/manage-staff/'.$client_id);
    } 
}
