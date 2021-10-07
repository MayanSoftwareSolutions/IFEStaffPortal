<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserPermissionChangeNotification;


class EditAccountForm extends Component
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
    public $user;
    public $currentRole;
    public $selectedRole;
    public $findRole;
    public $role;


    public $pages = [
        1 => 
        [
            'heading' => 'User Information',
            'subheading' => 'You can update a users information by modifying their details here. If you change their email, they will no longer be able to access the system with their old email',
        ],
        2 => 
        [
            'heading' => 'Permissions and password',
            'subheading' => 'You can only modify the users permissions here. For security reasons, only the user can change their password.',
        ],
    ];

    private $updateValidationRules = [
        1 => 
        [
            'name' => ['required', 'min:3', 'max:225', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'min:3', 'max:160', 'email'],
            'job_title' => ['required', 'min:3', 'max:100', 'regex:/^[\pL\s\-]+$/u'],
            'department' => ['required', 'min:3', 'max:100', 'regex:/^[\pL\s\-]+$/u'],
            'organisation' => ['required', 'min:3', 'max:100', 'regex:/^[\pL\s\-]+$/u'],

        ],
        2 => 
        [
            'role' => [],
        ],
    ];

    public function mount(User $user)
    {

        $this->user = $user;

        $roles = Role::pluck('title', 'id');
        $this->selectedRole = $roles;

        if($user) 
        {
            $this->user = $user;
            $this->name = $this->user->name;
            $this->email = $this->user->email;
            $this->job_title = $this->user->job_title;
            $this->department = $this->user->department;
            $this->organisation = $this->user->organisation;

            $userRole = $this->user->roles()->pluck('role_id')->first();
            $findRole = Role::where('id', $userRole)->first();
            $this->findRole = $findRole;
            $this->currentRole = $findRole;
        }
    }

    public function updated($propertyName)
    {
            $this->validateOnly($propertyName, $this->updateValidationRules[$this->currentPage]);
    }

    public function goToNextPage()
    {
        $this->validate($this->updateValidationRules[$this->currentPage]);
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
        $rules = collect($this->updateValidationRules)->collapse()->toArray();

        $this->validate($rules);

        $update = User::find($this->user->id)->update(
            [
                'name' => $this->name,
                'email' => $this->email,
                'job_title' => $this->job_title,
                'department' => $this->department,
                'organisation' => $this->organisation,
            ]);

        $updateRole = User::findOrFail($this->user->id);
        if($this->role > 0)
        {

        $updateRole->roles()->sync($this->role);

        $users = User::whereHas('roles', function ($query) {
            $query->where('id', 1);
        })->get();

        $getUser = $this->user; 

        foreach($users as $user)
        {
            Notification::send($user, new UserPermissionChangeNotification($getUser));
        }

        }
        else
        {
        $updateRole->roles()->sync($this->currentRole->id);

        }
        
        $this->success = 'The account registered to '.$this->user->name.' has been updated successfully !';

        session()->flash('message', $this->success);

        return redirect('/users');

    }

    public function render()
    {
        return view('livewire.edit-account-form');
    }
}
