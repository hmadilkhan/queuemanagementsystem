<div>
    <livewire:branch.form />
    <livewire:branch.delete />
    <div class="row align-items-center">
        <div class="border-0 mb-0">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Branches</h3>
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
                        <th>Country</th>
                        <th>City</th>
                        <th>Mobile</th>
                        <th>PTCL</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($branches as $key => $branch)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td><img src="{{ asset('storage/'.$branch->image) }}" class="rounded" width="30" height="30" /></td>
                        <td>{{ $branch->name }}</td>
                        <td>{{ $branch->company->name }}</td>
                        <td>{{ $branch->country->name }}</td>
                        <td>{{ $branch->city->name }}</td>
                        <td>{{ $branch->mobile }}</td>
                        <td>{{ $branch->ptcl }}</td>
                        <td>{{ $branch->address }}</td>
                        <td class="text-center">
                            <a wire:click="$dispatch('editBranch', {branchId: {{ $branch->id }}})" style="cursor: pointer;" data-toggle="tooltip" title="Edit">
                                <i class="icofont-pencil text-warning fs-5"></i></a>
                            <a wire:click="$dispatch('confirmDelete', {deleteId: {{ $branch->id }}})" style="cursor: pointer;" data-toggle="tooltip" title="Delete" class="ml-2">
                                <i class="icofont-trash text-danger fs-5"></i></a>
                        </td>
                    </tr>
                    
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>