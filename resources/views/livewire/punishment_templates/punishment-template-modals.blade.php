<!-- Show Punishment Modal -->
<div wire:ignore.self class="modal fade" id="showPunishmentTemplateModal" tabindex="-1" aria-labelledby="showPunishmentTemplateModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showPunishmentTemplateModalLabel">Show Punishment Template</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <strong>Name</strong>
                    <p>{{ $name }}</p>
                </div>
                <div class="mb-3">
                    <strong>Type</strong>
                    <p>{{ $type }}</p>
                </div>
                <div class="mb-3">
                    <strong>Duration</strong>
                    <p>{{ $duration }}</p>
                </div>
                <div class="mb-3">
                    <strong>Server</strong>
                    <p>{{ $server }}</p>
                </div>
                <div class="mb-3">
                    <strong>Reason</strong>
                    <p>{!!  $reason  !!}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Update Punishment Modal -->
<div wire:ignore.self class="modal fade" id="editPunishmentModal" tabindex="-1" aria-labelledby="editPunishmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPunishmentModalLabel">Edit Punishment</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent='updatePunishment'>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Type</label>
                        <input type="number" wire:model="type" class="form-control">
                        @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Player</label>
                        <input type="text" wire:model="playerName" class="form-control">
                        @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Punisher</label>
                        <input type="text" wire:model="punisherName" class="form-control">
                        @error('sound') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Time</label>
                        <input type="text" wire:model="time" class="form-control">
                        @error('time') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>End</label>
                        <input type="text" wire:model="end" class="form-control">
                        @error('end') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Reason</label>
                        <input type="text" wire:model="reason" class="form-control">
                        @error('reason') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Server</label>
                        <input type="text" wire:model="server" class="form-control">
                        @error('server') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Silent</label>
                        <input type="text" wire:model="silent" class="form-control">
                        @error('silent') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Active</label>
                        <input type="text" wire:model="active" class="form-control">
                        @error('active') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-mdb-dismiss="modal">Close</button>
                    <!--<button type="submit" class="btn btn-primary">Update</button>-->
                </div>
            </form>
        </div>
    </div>
</div>
