<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class UserManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $groupFiled = '';
    public $orderFiled = 'asc';
    public $isAddModalOpen = false;
    public $isEditModalOpen = false;
    public $name, $email, $password, $role = 'user', $status = 'active';
    public $editingUserId = null;
    protected $listeners = ['deleteUser'];
    protected $paginationTheme = 'bootstrap'; 


    public function updateSearch()
    {
        Log::info('Manual update search called:', [$this->search]);
    }

    public function groupBy($value)
    {
        $this->groupFiled = $value;
    }
    public function orderBy($value)
    {
        $this->orderFiled = $value;
    }

    public function render()
    {
        $query = User::query();

        // Apply search filter
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        }

        // Apply grouping and ordering
        if ($this->groupFiled) {
            $query->where('role', $this->groupFiled);
        }

        // Return the paginated results directly to the view
        $users = $query->orderBy('name', $this->orderFiled)->paginate(5);
        return view('livewire.user-management', [
            'users' => $users,
        ]);
    }

    // Open Add User Modal
    public function openAddModal()
    {
        $this->resetFields();
        $this->isAddModalOpen = true;
    }

    // Close Add User Modal
    public function closeAddModal()
    {
        $this->isAddModalOpen = false;
    }

    // Open Edit User Modal
    public function openEditModal($id)
    {
        $this->editingUserId = $id;
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->status = $user->status;
        $this->isEditModalOpen = true;
    }

    // Close Edit User Modal
    public function closeEditModal()
    {
        $this->isEditModalOpen = false;
    }

    // Reset Form Fields
    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = 'user';
        $this->status = 'active';
    }

    // Add New User
    public function addUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
            'status' => 'required|string',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => $this->role,
            'status' => $this->status,
        ]);

        $this->closeAddModal();
        session()->flash('message', 'User added successfully!');
    }

    // Update Existing User
    public function updateUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->editingUserId,
            'role' => 'required|string',
            'status' => 'required|string',
        ]);

        $user = User::findOrFail($this->editingUserId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'status' => $this->status,
        ]);

        $this->closeEditModal();
        session()->flash('message', 'User updated successfully!');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            session()->flash('message', 'User deleted successfully.');
            $this->emit('userDeleted');
        }
    }
}
