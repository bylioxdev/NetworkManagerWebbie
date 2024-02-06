<div>
    {{--@include('livewire.permissions.permission-group-modals')--}}

    @if (session()->has('message'))
        <h5 class="alert alert-success">{{ session('message') }}</h5>
    @endif

    <div class="card">
        <div class="card-header">
            <h5>Members of {{ $group->name }}</h5>
            <label for="groupMemberSearch" class="float-end mx-2">
                <input id="groupMemberSearch" type="search" wire:model="search" class="form-control"
                       placeholder="Search..." />
            </label>
        </div>
        <div class="card-body border-0 shadow table-responsive">
            <table class="table text-center">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Server</th>
                    <th>Expired</th>
                    {{--<th>Actions</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($members as $member)
                    @php
                        $server = $member->server;
                        $expires = $member->expires;
                        if (empty($server)) {
                            $server = "ALL";
                        }
                        if (empty($expires)) {
                            $expires = "Never";
                        }
                    @endphp
                    <tr>
                        <td>{{ $member->permissionPlayer->name }}</td>
                        <td>{{ $server }}</td>
                        <td>{{ $expires }}</td>
                        {{--<td>
                            <button type="button" style="background: transparent; border: none;" data-mdb-toggle="modal"
                                    data-mdb-target="#editGroupModal"
                                    --}}{{--wire:click="editGroup({{$group->id}})"--}}{{-->
                                <i class="material-icons text-warning">edit</i>
                            </button>
                            <button type="button" style="background: transparent; border: none;" data-mdb-toggle="modal"
                                    data-mdb-target="#deleteGroupModal"
                                    --}}{{--wire:click="deleteGroup({{ $group->id }})"--}}{{-->
                                <i class="material-icons text-danger">delete</i>
                            </button>
                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $members->links() }}
            </div>
        </div>
    </div>
    {{--<div class="p-4">
        <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#addGroupModal"
                wire:click="addGroup">
            <i style="font-size: 18px !important;" class="material-icons">add</i> Add Group
        </button>
    </div>--}}
</div>
