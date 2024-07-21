<div>
    <livewire:permission.form />
    <livewire:permission.delete />
    <div class="row align-items-center">
        <div class="border-0 mb-0">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Permissions</h3>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $key => $permission)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $permission->name }}</td>
                        <td class="text-center">
                            <bitton wire:click="$dispatch('editPermission',{permissionId: {{ $permission->id }}})" style="cursor: pointer;" data-toggle="tooltip" title="Edit">
                                <i class="icofont-pencil text-warning"></i></button>
                            <a wire:click="$dispatch('confirmDelete', {deleteId: {{ $permission->id }}})" style="cursor: pointer;" data-toggle="tooltip" title="Delete" class="ml-2">
                                <i class="icofont-trash text-danger"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>