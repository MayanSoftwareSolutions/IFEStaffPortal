<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\UsersRepository;

class UserController extends Controller
{

    //User Search Repository
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function index(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = $this->usersRepository
        ->search($request->get('name'))
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('users.index', compact('users'));

    }


    public function show($id)
    {
       $user = User::with('roles')->where('id', $id)->first();
       $users = User::where('department', $user->department)->get();
       
       return view('users.show', compact('user', 'users'));
    }



    public function destroy($id)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user=User::find($id);

        $user->delete();

        $success = $user->name. "'s account has been deleted successfully !";

        session()->flash('message', $success);

        return redirect()->route('users')->withSuccessMessage('Account deleted');
    }

    public function active($id)
    {

        $user = User::find($id);

        if($user->active == true)
        {
            $user->update(['active' => false]);
            $user->save();

            $success = $user->name. "'s account has been deactivated successfully !";

            session()->flash('message', $success);

            return back();
        }
        else
        {
            $user->update(['active' => true ]);
            $user->save();

            $success = $user->name. "'s account has been activated successfully !";

            session()->flash('message', $success);

            return back();
        }

    }
}
