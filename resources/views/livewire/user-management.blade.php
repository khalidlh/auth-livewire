<div class="container mt-5">
    <h2>User Management</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Add User Button -->
        <button class="btn btn-primary " wire:click="openAddModal" style="width: 200px">
            <i class="fas fa-plus-circle me-1"></i> Add User
        </button>

        <!-- Search Bar -->
        <div class="input-group ms-3"> <!-- Ajout de 'ms-3' pour espacer le groupe d'entrée -->
            <input type="text" class="form-control" placeholder="Search by name or email" wire:model="search">
            <button class="btn btn-outline-secondary" wire:click="updateSearch" type="button">
                <i class="fas fa-search"></i> <!-- Icône de recherche -->
            </button>
        </div>
    </div>


    <!-- Group By and Order By -->
    <div class="d-flex justify-content-between mb-3">
        <div>
            <select class="form-select" wire:model="groupField" wire:change="groupBy($event.target.value)">
                <option value="">Group By Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <div>
            <select class="form-select" wire:model="orderField" wire:change="orderBy($event.target.value)">
                <option value="asc">Order By Name (A-Z)</option>
                <option value="desc">Order By Name (Z-A)</option>
            </select>
        </div>
    </div>



    <!-- User Table -->
    <table class="table table-striped table-bordered" id="userTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td><span
                            class="badge {{ $user->status == 'active' ? 'bg-success' : 'bg-danger' }}">{{ ucfirst($user->status) }}</span>
                    </td>
                    <td class="table-actions">
                        <button class="text-primary" wire:click="openEditModal({{ $user->id }})"><i
                                class="fas fa-edit"></i></button>
                        <button class="text-danger" onclick="confirmDelete({{ $user->id }})"><i
                                class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Aucun utilisateur trouvé.</td>
                </tr>
            @endforelse

        </tbody>
    </table>

    <!-- Pagination links -->
    <div class="d-flex justify-content-center mt-3">
        {{ $users->links() }}
    </div>

    <!-- Add User Modal -->
    <div class="modal fade @if ($isAddModalOpen) show @endif" tabindex="-1"
        style="@if ($isAddModalOpen) display:block; @endif">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="btn-close" wire:click="closeAddModal"></button>
                </div>
                <div class="modal-body">
                    <!-- Name Field -->
                    <div class="mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Name" wire:model="name">
                        @error('name')
                            <div class="invalid-feedback d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2"></i> <!-- Error Icon -->
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" wire:model="email">
                        @error('email')
                            <div class="invalid-feedback d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2"></i> <!-- Error Icon -->
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" wire:model="password">
                        @error('password')
                            <div class="invalid-feedback d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2"></i> <!-- Error Icon -->
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Role Field -->
                    <div class="mb-3">
                        <select class="form-select @error('role') is-invalid @enderror" wire:model="role">
                            <option value="">Select Role</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2"></i> <!-- Error Icon -->
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Status Field -->
                    <div class="mb-3">
                        <select class="form-select @error('status') is-invalid @enderror" wire:model="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2"></i> <!-- Error Icon -->
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" wire:click="closeAddModal">Close</button>
                    <button class="btn btn-primary" wire:click="addUser">Save User</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit User Modal -->
    <div class="modal fade @if ($isEditModalOpen) show @endif" tabindex="-1"
        style="@if ($isEditModalOpen) display:block; @endif">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" wire:click="closeEditModal"></button>
                </div>
                <div class="modal-body">
                    <!-- Name Field -->
                    <div class="mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Name" wire:model="name">
                        @error('name')
                            <div class="invalid-feedback d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2"></i> <!-- Error Icon -->
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" wire:model="email">
                        @error('email')
                            <div class="invalid-feedback d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2"></i> <!-- Error Icon -->
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Role Field -->
                    <div class="mb-3">
                        <select class="form-select @error('role') is-invalid @enderror" wire:model="role">
                            <option value="">Select Role</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2"></i> <!-- Error Icon -->
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Status Field -->
                    <div class="mb-3">
                        <select class="form-select @error('status') is-invalid @enderror" wire:model="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2"></i> <!-- Error Icon -->
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" wire:click="closeEditModal">Close</button>
                    <button class="btn btn-primary" wire:click="updateUser">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripte')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Utilisation de fetch pour appeler la méthode de suppression
                    fetch(`/delete-user/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Assurez-vous d'envoyer le token CSRF
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'The user has been deleted.',
                                    'success'
                                ).then(() => {
                                    // Rafraîchir la page ou mettre à jour l'interface utilisateur
                                    location.reload(); // Option 1 : rafraîchir la page
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Could not delete the user.',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        });
                }
            });
        }
    </script>
    @if (session('message'))
        <script>
            document.addEventListener('livewire:load', function() {
                // Afficher SweetAlert si un message est présent
                Swal.fire({
                    title: 'Succès!',
                    text: "{{ session('message') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
@endpush
