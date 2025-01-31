<div>
    @include('livewire.punishment_templates.punishment-template-modals')

    @if (session()->has('message'))
        <h5 class="alert alert-success">{{ session('message') }}</h5>
    @endif

    <div class="card">
        <div class="card-header h5">
            Punishment Templates
            <label for="punishmentTemplateSearch" class="float-end mx-2">
                <input id="punishmentTemplateSearch" type="search" wire:model.live="search" class="form-control"
                       placeholder="Search..."/>
            </label>
        </div>
        <div class="card-body border-0 shadow table-responsive">
            <table id="punishmentTemplatesTable" class="table text-center">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Duration</th>
                    <th>Server</th>
                    <th>Reason</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($punishmentTemplates as $template)
                    <tr>
                        <td>{{ $template->id }}</td>
                        <td>{{ $template->name }}</td>
                        <td>{{ $template->type->name() }}</td>
                        <td>
                            @if($template->duration == -1)
                                Permanent
                            @else
                                {{ $template->duration }}
                            @endif
                        </td>
                        <td>
                            @if($template->server == null)
                                Global
                            @else()
                                {{ $template->server }}
                            @endif
                        </td>
                        <td>{!! $template->reason !!}</td>
                        <th>
                            <button type="button" style="background: transparent; border: none;" data-mdb-ripple-init data-mdb-modal-init
                                    data-mdb-target="#showPunishmentTemplateModal"
                                    wire:click="showPunishmentTemplate({{ $template->id }})">
                                <i class="material-icons text-info">info</i>
                            </button>
                            @can('edit_pre_punishments')
                                <button type="button" style="background: transparent; border: none;"
                                        data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#editTemplateModal"
                                        wire:click="editTemplate({{$template->id}})">
                                    <i class="material-icons text-warning">edit</i>
                                </button>
                                <button type="button" style="background: transparent; border: none;"
                                        data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#deletePunishmentTemplateModal"
                                        wire:click="deletePunishmentTemplate({{$template->id}})">
                                    <i class="material-icons text-danger">delete</i>
                                </button>
                            @endcan
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $punishmentTemplates->links() }}
            </div>
        </div>
    </div>
    @can('edit_pre_punishments')
        <div class="p-4">
            <button type="button" class="btn btn-primary" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#addTemplateModal"
                    wire:click="addTemplate">
                <i style="font-size: 18px !important;" class="material-icons">add</i> Add Template
            </button>
        </div>
    @endcan
</div>
