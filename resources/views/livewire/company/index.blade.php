<div>
    <livewire:company.form />
    <livewire:company.delete />
    <div class="card mt-3">
        <div class="card-header">
            <h4 class="card-title">company List</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Mobile</th>
                        <th>PTCL</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $key => $company)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td><img src="{{ asset('storage/'.$company->image) }}" class="rounded" width="30" height="30"/></td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->country->name }}</td>
                        <td>{{ $company->city->name }}</td>
                        <td>{{ $company->mobile }}</td>
                        <td>{{ $company->ptcl }}</td>
                        <td>{{ $company->address }}</td>
                        <td class="text-center">
                            <a wire:click="$dispatch('editCompany', {companyId: {{ $company->id }}})" style="cursor: pointer;" data-toggle="tooltip" title="Edit">
                                <i class="icofont-pencil text-warning fs-5"></i></a>
                            <a wire:click="$dispatch('confirmDelete', {deleteId: {{ $company->id }}})" style="cursor: pointer;" data-toggle="tooltip" title="Delete" class="ml-2">
                                <i class="icofont-trash text-danger fs-5"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>