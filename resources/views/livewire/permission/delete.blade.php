<div>
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this post?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        wire:click="$dispatch('hide-delete-modal')">Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click="deletePermission">Delete</button>
                </div>
            </div>
        </div>
    </div>
    @script
        <script>
            window.addEventListener('show-delete-modal', event => {
                $('#deleteModal').modal('show');
            });

            window.addEventListener('hide-delete-modal', event => {
                $('#deleteModal').modal('hide');
            });
        </script>
    @endscript
</div>
