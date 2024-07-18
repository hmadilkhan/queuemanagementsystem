<div>
    <div class="row align-items-center">
            <div class="border-0 mb-0">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Create New User</h3>
                </div>
            </div>
        </div>
        <div class="card card-info">
            <div class="card-body">
                <!-- ADD NEW PRODUCT PART START -->
                <form wire:submit.prevent="save">
                    <div class="row g-3  mb-3 align-items-center">
                        <div class="col-sm-3">
                            <label class="form-label">Company</label>
                            <select class="form-select form-control select2 form-control-md" aria-label="Default select Company" id="companyId" wire:model="companyId">
                                <option value="">Select Company</option>
                                @foreach ($companies as $company)
                                <option @selected($company->id == $companyId) value="{{ $company->id }}">
                                    {{ $company->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('companyId')
                            <div class="text-danger message mt-2"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">Branch</label></br>
                            <select class="form-select select2 form-control form-control-md" aria-label="Default select branch" id="branchId" wire:model="branchId" {{ is_null($companyId) ? 'disabled' : '' }}>
                                <option value="">Select Branch</option>
                                @foreach ($branches as $branch)
                                <option @selected($branch->id == $branchId) value="{{ $branch->id }}">
                                    {{ $branch->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('branchId')
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
                            <label>Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" wire:model="username" placeholder="Enter Complete Username">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-sm-3 ">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" wire:model.lazy="password" placeholder="Enter Complete Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-sm-3 ">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" wire:model.lazy="password_confirmation" placeholder="Enter Complete Password">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">Roles</label></br>
                            <select class="form-select select2 form-control form-control-md" aria-label="Default select role" id="roleId" wire:model="roleId" multiple>
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                <option {{in_array($role->name,$roleId) ? 'selected' : ''}} value="{{ $role->name }}">
                                    {{ $role->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('roleId')
                            <div class="text-danger message mt-2"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="col-sm-3 ">
                            <label>Image</label>
                            <input type="file" class="form-control" wire:model="image">
                            @error('image')
                            <div class="text-danger message mt-2"><strong>{{ $message }}</strong></div>
                            @enderror
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
                        $('#companyId').on('change', function(e) {
                            var data = $('#companyId').select2("val");
                            @this.set('companyId', data);
                        });
    
                        $('#branchId').on('change', function(e) {
                            var data = $('#branchId').select2("val");
                            @this.set('branchId', data);
                        });
                        $('#roleId').on('change', function(e) {
                            var data = $('#roleId').select2("val");
                            console.log(data);
                            @this.set('roleId', data);
                        });
                        Livewire.hook('morph.updating', ({
                            component,
                            cleanup
                        }) => {
                            $('#companyId').select2();
                            $('#branchId').select2();
                            $('#roleId').select2();
                        })
                    });
                </script>
                @endscript
            </div>
        </div>
    </div>