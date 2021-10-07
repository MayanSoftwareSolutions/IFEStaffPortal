<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RolePermissionChangeNotification;

class EditRoleForm extends Component
{
    public $role;
    public $permissions = [];
    public $selected = [];
    public $currentPage = 1;
    public $success;
    public $title;
    public $getPermissions = [];
    public $permissionsError;

    public $pages = [
        1 => 
        [
            'heading' => 'Role Profile',
            'subheading' => 'Please ensure the role title is descriptive of the profile, as this is what will be seen when assigning this role profile to system users',
        ],
        2 => 
        [
            'heading' => 'Permissions',
            'subheading' => 'Please select the appropriate system permissions from the check boxes. Please ensure these are specific to the type of role profile which will be used',
        ],
    ];

    private $validationRules = [
        1 => 
        [
            'title' => ['required', 'min:3', 'max:225', 'regex:/^[\pL\s\-]+$/u',],
        ],
        2 => 
        [
            'permissions' => ['required'],
        ],
    ];

    public function mount(Role $role)
    {
        $this->role = $role;

        $this->getPermissions = Permission::all();
        $this->selected = $this->role->permissions()->pluck('permission_id', 'permission_id')->toArray();
        

        if($role)
        {   
            $this->title = $this->role->title;
            $this->permissions = array_fill_keys($this->role->permissions()->pluck('permission_id', 'permission_id')->toArray(), 1 );
        }

    }

    public function updated($propertyName)
    {
            $this->validateOnly($propertyName, $this->validationRules[$this->currentPage]);
    }

    public function goToNextPage()
    {
        $this->validate($this->validationRules[$this->currentPage]);
        $this->currentPage++;
    }

    public function goToPreviousPage()
    {
        $this->currentPage--;
    }

    public function resetSuccess()
    {
        $this->reset('success');
    }

    public function permissionsError()
    {
        $this->permissionsError = "A role without any permissions is not allowed. A minimum of one permission is required for any role";
    }

    public function submit()
    {

        $rules = collect($this->validationRules)->collapse()->toArray();

        $this->validate($rules);

        $update = Role::find($this->role->id)->update(['title' => $this->title,]);

        $permission_data = array_filter($this->selected);
        $updatepermission = Role::findOrFail($this->role->id);
        $updatepermission->permissions()->sync($permission_data);  


        if(count($this->permissions) != count($permission_data))
        {

        $users = User::whereHas('roles', function ($query) {
            $query->where('id', 1);
        })->get();

        $currentRole = $this->role; 

        foreach($users as $user)
        {
            Notification::send($user, new RolePermissionChangeNotification($currentRole));
        }

        }
        

        $this->success = 'The role '.$this->role->title.' has been updated successfully !';

        session()->flash('message', $this->success);

        return redirect('/roles');
        
        
    }
    public function render()
    {
        // dd($this->selected);
        return view('livewire.edit-role-form');
    }
}
