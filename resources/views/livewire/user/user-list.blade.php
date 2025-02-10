<div>
    <!-- Display Alert Messages -->
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session()->has('warning'))
        <div class="alert alert-warning">{{ session('warning') }}</div>
    @endif

    <!-- Table for Themes -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr style="text-align: center;">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>                      
                        <td>{{ $user->email }}</td>
                        <td>
                            <!-- Retrieve and Display Role -->
                            {{ $user->getRoleNames()->implode(', ') }}
                        </td>
                        <td>
                            <button wire:click="view({{ $user->id }})" class="btn btn-sm">
                                <i class="fa fa-info-circle"></i>
                            </button>
                            <button wire:click="delete({{ $user->id }})" class="btn btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No users available.</td>
                    </tr>
                @endforelse
            </tbody>            
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="col-12">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
</div>
