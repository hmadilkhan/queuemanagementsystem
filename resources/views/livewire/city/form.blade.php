<div>
    <div class="card card-info">
        <div class="card-header">
            <h4 class="card-title">Create New City</h4>
        </div>
        <div class="card-body">
            <!-- ADD NEW PRODUCT PART START -->
            <form wire:submit.prevent="save">
                <div class="row g-3  mb-3 align-items-center">
                    <div class="col-sm-4">
                        <label class="form-label">Country</label>
                        <select class="form-select select2 form-control form-control-md" aria-label="Default select Country" id="country_id" wire:model="country_id">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}">
                                {{ $country->name }}
                            </option>
                            @endforeach
                        </select>
                        @error("country_id")
                        <div class="text-danger message mt-2"><strong>{{$message}}</strong></div>
                        @enderror
                    </div>
                    <div class="col-sm-4 ">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control form-control-md @error('name') is-invalid @enderror" id="name" wire:model="name" placeholder="Enter Complete Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label></label>
                        <div class="form-group ">
                            <button type="button" class="btn btn-danger float-right ml-2 text-white"><i class="icofont-ban"></i>
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary float-right " value="save"><i class="icofont-save"></i> Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- ADD NEW PRODUCT PART END -->
        </div>
    </div>
</div>