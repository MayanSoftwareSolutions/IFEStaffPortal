<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role;
use App\Models\Permission;
use DB;
use Illuminare\Support\Facades\Gate;

class NewRoleForm extends Component
{
    public $role;
    public $permissions = [];
    public $currentPage =1;
    public $success;
    public $title;
    public $selectedPermissions;

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
            'title' => ['required', 'min:3', 'max:225', 'regex:/^[\pL\s\-]+$/u', 'unique:roles'],
    

        ],
        2 => 
        [
            'permissions' => ['required'],
        ],
    ];

    public function mount()
    {
        $permissions = Permission::get();
        $this->selectedPermissions = $permissions;

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

    public function submit()
    {

        $rules = collect($this->validationRules)->collapse()->toArray();

        $this->validate($rules);

        $role = Role::create(['title' => $this->title,]);

        $permission_data = [];

        foreach($this->permissions as $permission)
            {
                $get_role_id = $role->id;
                $permission_data[] =[
                    'role_id' => $get_role_id,
                    'permission_id' => $permission,
                ];
            }

        $role->permissions()->sync($permission_data);        

        $this->reset();
        $this->resetValidation();

        $this->success = 'The role profile has been created successfully !';

        session()->flash('message', $this->success);

        return redirect('/roles');
        
    }


    public function render()
    {
        return view('livewire.new-role-form');
    }
}
