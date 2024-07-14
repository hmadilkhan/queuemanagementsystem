<div>
    <livewire:city.form />
    <livewire:city.delete />
    <div class="card mt-3">
        <div class="card-header">
            <h4 class="card-title">City List</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Country</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $key => $city)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $city->country->name }}</td>
                        <td>{{ $city->name }}</td>
                        <td class="text-center">
                            <a wire:click="$dispatch('editCity',{cityId: {{ $city->id }}})" style="cursor: pointer;" data-toggle="tooltip" title="Edit">
                                <i class="icofont-pencil text-warning fs-5"></i></a>
                            <a wire:click="$dispatch('confirmDelete', {deleteId: {{ $city->id }}})" style="cursor: pointer;" data-toggle="tooltip" title="Delete" class="ml-2">
                                <i class="icofont-trash text-danger fs-5"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>