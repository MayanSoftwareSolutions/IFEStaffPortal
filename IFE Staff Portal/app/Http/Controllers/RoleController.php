<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\RolesRepository;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    //User Search Repository
    public function __construct(RolesRepository $rolesRepository)
    {
        $this->rolesRepository = $rolesRepository;
    }

    public function index(Request $request)
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = $this->rolesRepository
        ->search($request->get('title'))
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('roles.index', compact('roles'));
    }


    public function show($id)
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $role = Role::with('permissions')->where('id', $id)->first();

        $profile_users = DB::table('role_user')
        ->join('users', 'id', '=', 'user_id')
        ->select('id', 'name', 'email', 'job_title', 'department', 'organisation', 'profile_photo_path')
        ->where('role_id', $id)
        ->paginate(4);

       
       return view('roles.show', compact('role', 'profile_users'));
    }



    public function destroy($id)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role= Role::find($id);

        $assigned = User::whereHas('roles', function ($query) use ($id)
        {
            $query->where('id', $id);
        })->count();

        if($assigned >= 1)
        {
            $failed = $role->title." cannot be deleted as there are users assigned to this role";

            session()->flash('failed', $failed);

            return redirect()->route('roles');
        }

        $role->delete();

        $success = $role->title. " has been deleted successfully !";

        session()->flash('message', $success);

        return redirect()->route('roles');
    }
}
