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
    
    //Edit/Create form
    //public $generatePassword = false;
    //public $password = '';
    //public $password_confirmation = '';
    
    //Table values & filters
    public $search = '';
    private $paginate = 10;
    
    protected $queryString = [
        'search' => ['except' => '']
    ];
    
    public function rules()
    {
        return [
            'user.name' => 'required|string|max:255',
            'user.email' => 'required|email|max:255',
            'user.active' => 'required|boolean',
            //'password' => 'min:12|confirmed',
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
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    
    public function updatedShowEditModal()
    {
        //$this->reset(['generatePassword', 'password', 'password_confirmation']);
    //    $this->reset(['generatePassword', 'password', 'password_confirmation']);
    }
    
    public function edit(User $user)
    {
        if ( $this->user->isNot($user) ) $this->user = $user;
        $this->showEditModal = true;
    }
    
    public function save()
    {
        //$attributes = $this->validate([
        //    'user.name' => 'required|string|max:255',
        //    'user.email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
        //    'user.active' => 'required|boolean',
        //    //'password' => 'min:12|confirmed',
        //    //'generatePassword' => 'boolean',
        //]);
        
        //if ( $attributes['generatePassword'] )
        //    $password = Str::random(12);
        //elseif ( ! empty($attributes['password']) )
        //    $password = $attributes['password'];
        //
        //empty($password) ?: $attributes['user']['password'] = Hash::make($password);
        
        //This is big shit, but seems to be a bug in @entangle
        //$attributes['user']['active'] = $attributes['active'];
        
        $this->validate();
        
        $this->user->save();
        
        $this->reset(['generatePassword', 'password', 'password_confirmation','showEditModal']);
        
    }
    
    public function render()
    {
        return view('livewire.users', [
            'users' => User::paginate($this->paginate)
        ]);
    }
}
