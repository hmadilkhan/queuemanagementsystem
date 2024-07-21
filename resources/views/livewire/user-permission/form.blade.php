<div>
    <div class="card card-info">
        <div class="card-header">
            <h4 class="card-title">Assign New Permission</h4>
        </div>
        <div class="card-body">
            <!-- ADD NEW PRODUCT PART START -->
            <form wire:submit.prevent="save">
                <div class="row g-3  mb-3 align-items-center">
                    <div class="col-sm-4">
                        <label class="form-label">Users</label></br>
                        <select class="form-select select2 form-control form-control-md" aria-label="Default select user"
                            id="user_id" wire:model="user_id">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="text-danger message mt-2"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">Permissions</label>
                        <select class="form-select select2 form-control form-control-md"
                            aria-label="Default select permission" id="permission_id" wire:model="permission_id" multiple>
                            <option value="">Select Permission</option>
                            @foreach ($permissions as $permission)
                                <option {{ in_array($permission->name,$permission_id) }} value="{{ $permission->name }}">
                                    {{ $permission->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('permission_id')
                            <div class="text-danger message mt-2"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label></label>
                        <div class="form-group ">
                            <button type="button" class="btn btn-danger float-right ml-2 text-white"><i
                                    class="icofont-ban"></i>
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary float-right " value="save"><i
                                    class="icofont-save"></i> Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- ADD NEW PRODUCT PART END -->
            @script
            <script>
                $(document).ready(function() {
                    $('#user_id').on('change', function(e) {
                        var data = $('#user_id').select2("val");
                        @this.set('user_id', data);
                    });

                    $('#permission_id').on('change', function(e) {
                        var data = $('#permission_id').select2("val");
                        // console.log(data);
                        @this.set('permission_id', data);
                    });
                    Livewire.hook('morph.updating', ({
                        component,
                        cleanup
                    }) => {
                        $('#user_id').select2();
                        $('#permission_id').select2();
                    })
                });
            </script>
            @endscript
        </div>
    </div>
</div>
