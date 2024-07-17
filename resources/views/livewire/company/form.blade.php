<div>
<div class="row align-items-center">
        <div class="border-0 mb-0">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Create New Company</h3>
            </div>
        </div>
    </div>
    <div class="card card-info">
        <div class="card-body">
            <!-- ADD NEW PRODUCT PART START -->
            <form wire:submit.prevent="save">
                <div class="row g-3  mb-3 align-items-center">
                    <div class="col-sm-3">
                        <label class="form-label">Country</label>
                        <select class="form-select form-control select2 form-control-md" aria-label="Default select Country" id="countryId" wire:model="countryId">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                            <option @selected($country->id == $countryId) value="{{ $country->id }}">
                                {{ $country->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('countryId')
                        <div class="text-danger message mt-2"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label">City</label></br>
                        <select class="form-select select2 form-control form-control-md" aria-label="Default select city" id="cityId" wire:model="cityId" {{ is_null($countryId) ? 'disabled' : '' }}>
                            <option value="">Select City</option>
                            @foreach ($cities as $city)
                            <option @selected($city->id == $cityId) value="{{ $city->id }}">
                                {{ $city->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('cityId')
                        <div class="text-danger message mt-2"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="col-sm-3 ">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name" placeholder="Enter Complete Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-3 ">
                        <label>Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" wire:model="email" placeholder="Enter Complete Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-3 ">
                        <label>Mobile</label>
                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" wire:model="mobile" placeholder="Enter Complete Mobile">
                        @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-3 ">
                        <label>Landline</label>
                        <input type="text" class="form-control @error('ptcl') is-invalid @enderror" wire:model="ptcl" placeholder="Enter Complete Landline">
                        @error('ptcl')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-3 ">
                        <label>Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" wire:model="address" placeholder="Enter Complete Address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-3 ">
                        <label>Image</label>
                        <input type="file" class="form-control" wire:model="image">
                    </div>
                    @if ($image )
                    <div class="form-group">
                        <label for="preview">Preview:</label>
                        <img src="{{$image->temporaryUrl()}}" alt="Image Preview" class="img-thumbnail" style="max-width: 300px;">
                    </div>
                    @elseif ($prevImage )
                    <div class="form-group">
                        <label for="preview">Preview:</label>
                        <img src="{{asset('storage/'.$prevImage)}}" alt="Image Preview" class="img-thumbnail" style="max-width: 300px;">
                    </div>
                    @endif
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
            @script
            <script>
                $(document).ready(function() {
                    $('#countryId').on('change', function(e) {
                        var data = $('#countryId').select2("val");
                        @this.set('countryId', data);
                    });

                    $('#cityId').on('change', function(e) {
                        var data = $('#cityId').select2("val");
                        console.log(data);
                        @this.set('cityId', data);
                    });
                    Livewire.hook('morph.updating', ({
                        component,
                        cleanup
                    }) => {
                        $('#countryId').select2();
                        $('#cityId').select2();
                    })
                });
            </script>
            @endscript
        </div>
    </div>
</div>