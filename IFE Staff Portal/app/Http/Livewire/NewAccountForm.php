<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role;
use App\Models\User;
use App\Models\UserSettings;
use Illuminate\Support\Facades\Gate;

class NewAccountForm extends Component
{
    public $currentPage =1;
    public $success;
    public $name;
    public $lastName;
    public $email;
    public $job_title;
    public $department;
    public $organisation;
    public $password;
    public $confirmPassword;
    public $selectedRole;
    public $role;
 

    public $pages = [
        1 => 
        [
            'heading' => 'User Information',
            'subheading' => 'Please enter all the required information as set here including employement information',
        ],
        2 => 
        [
            'heading' => 'Permissions and password',
            'subheading' => 'Create a password for the new account and assign a role which already has preloaded permissions',
        ],
    ];

    
    private $validationRules = [
        1 => 
        [
            'name' => ['required', 'min:3', 'max:225', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'min:3', 'max:160', 'email', 'unique:users'],
            'job_title' => ['required', 'min:3', 'max:100', 'regex:/^[\pL\s\-]+$/u'],
            'department' => ['required', 'min:3', 'max:100', 'regex:/^[\pL\s\-]+$/u'],
            'organisation' => ['required', 'min:3', 'max:100', 'regex:/^[\pL\s\-]+$/u'],

        ],
        2 => 
        [
            'password' => ['required', 'string', 'min:8'],
            'confirmPassword' => ['required', 'string', 'min:8', 'same:password'],
            'role' => ['required', 'min:1', 'max:3']
        ],
    ];


    public function mount()
    {
        $roles = Role::pluck('title', 'id');
        $this->selectedRole = $roles;

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

        $create = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'job_title' => $this->job_title,
                'department' => $this->department,
                'organisation' => $this->organisation,
                'password' => bcrypt($this->password),
                ]);
                
        $create->roles()->sync($this->role);

        $defaultSettings = UserSettings::create([
            'user_id' => $create->id,
            'user_profile_widget' => 1,
            'user_activity_log_widget' => 1,
            'user_notifications' => 1,
        ]);

        $this->reset();
        $this->resetValidation();

        $this->success = 'The user account for '.$this->name.' has been created successfully !';

        session()->flash('message', $this->success);

        return redirect('/users');
        
    }

    public function render()
    {
        return view('livewire.new-account-form');
    }
}
