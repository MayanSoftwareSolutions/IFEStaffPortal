<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\User;

class UserViewModal extends ModalComponent
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function update()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.user-view-modal');
    }
}
