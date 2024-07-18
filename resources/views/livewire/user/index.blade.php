<div>
    <livewire:user.form />
    <livewire:user.delete />
    <div class="row align-items-center">
        <div class="border-0 mb-0">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Users</h3>
            </div>
        </div>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Branch</th>
                        <th>username</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td><img src="{{ asset('storage/' . $user->image) }}" class="rounded" width="30"
                                    height="30" /></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->company->name }}</td>
                            <td>{{ $user->branch->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td class="text-center">
                                <a wire:click="$dispatch('editUser', {userId: {{ $user->id }}})"
                                    style="cursor: pointer;" data-toggle="tooltip" title="Edit">
                                    <i class="icofont-pencil text-warning fs-5"></i></a>
                                <a wire:click="$dispatch('confirmDelete', {deleteId: {{ $user->id }}})"
                                    style="cursor: pointer;" data-toggle="tooltip" title="Delete" class="ml-2">
                                    <i class="icofont-trash text-danger fs-5"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
