<div>
    <livewire:country.form />
    <livewire:country.delete />
    <div class="card mt-3">
        <div class="card-header">
            <h4 class="card-title">Country List</h3>
        </div>
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
                    @foreach ($countries as $key => $country)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $country->name }}</td>
                        <td class="text-center">
                            <bitton wire:click="$dispatch('editCountry',{countryId: {{ $country->id }}})" style="cursor: pointer;" data-toggle="tooltip" title="Edit">
                                <i class="icofont-pencil text-warning"></i></button>
                            <a wire:click="$dispatch('confirmDelete', {deleteId: {{ $country->id }}})" style="cursor: pointer;" data-toggle="tooltip" title="Delete" class="ml-2">
                                <i class="icofont-trash text-danger"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>