<div>
    <div class="row align-items-center">
        <div class="border-0 mb-0">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Create New Permission</h3>
            </div>
        </div>
    </div>
    <div class="card card-info">
        <div class="card-body">
            <!-- ADD NEW PRODUCT PART START -->
            <form wire:submit.prevent="save">
                <div class="row g-3  mb-3 align-items-center">
                    <div class="col-sm-3 ">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name" placeholder="Enter Complete Name">
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