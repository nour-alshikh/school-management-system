<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showForm"
    type="button">{{ trans('parents.add_parent') }}</button>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center">
        <thead>
            <tr class="table-success">
                <th>#</th>
                <th>{{ trans('parents.email') }}</th>
                <th>{{ trans('parents.f_name') }}</th>
                <th>{{ trans('parents.f_national_id') }}</th>
                <th>{{ trans('parents.f_passport_id') }}</th>
                <th>{{ trans('parents.f_phone') }}</th>
                <th>{{ trans('parents.f_job') }}</th>
                <th>{{ trans('parents.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @foreach ($guardians as $guardian)
                <tr wire:key="{{ $i }}">
                    <?php $i++; ?>
                    <td>{{ $i }}</td>
                    <td>{{ $guardian->email }}</td>
                    <td>{{ $guardian->father_name }}</td>
                    <td>{{ $guardian->father_national_id }}</td>
                    <td>{{ $guardian->father_passport_id }}</td>
                    <td>{{ $guardian->father_phone }}</td>
                    <td>{{ $guardian->father_job }}</td>
                    <td>
                        <button wire:click="edit({{ $guardian->id }})" title="{{ trans('parents.edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete{{ $guardian->id }}" title="{{ trans('parents.delete') }}"><i
                                class="fa fa-trash"></i>
                        </button>
                        @include('livewire.modals.delete-parent')
                    </td>
                </tr>
            @endforeach
    </table>
</div>
