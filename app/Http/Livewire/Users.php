<?php

namespace App\Http\Livewire;

use App\Http\Traits\FindUserCandidates;
use App\Models\Aux\File;
use App\Models\Client;
use App\Models\Post;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use App\Notifications\PasswordNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination, AuthorizesRequests;
    
    //Model
    public User $user;
    
    //Modals
    public $showEditModal = false;
    
    //Edit form
    public $active = false;
    
    //Table values & filters
    private $paginate = 10;
    
    public function rules()
    {
        return [
            'user.name' => 'required|string|max:255',
            'user.email' => 'required|email|max:255',
            'user.active' => 'required|boolean',
            'active' => 'required|boolean',
        ];
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function mount()
    {
        $this->user = User::make(['active' => false]);
    }
   
    public function edit(User $user)
    {
        if ( $this->user->isNot($user) ) $this->user = $user;
        $this->showEditModal = true;
    }
    
    public function save()
    {
        $attributes = $this->validate();
    
        //That is big shit but seems to be a bug on @entangle
        $attributes['user']['active'] = $attributes['active'];
        
        $this->user->save();
        
        $this->reset(['active','showEditModal']);
    }
    
    public function render()
    {
        return view('livewire.users', [
            'users' => User::paginate($this->paginate)
        ]);
    }
}
