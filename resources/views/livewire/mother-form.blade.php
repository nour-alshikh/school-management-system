@if ($current_step != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
<div class="col-xs-12">
    <div class="col-md-12">

        <div class="form-row">
            <div class="col">
                <label for="title">{{ trans('parents.m_name') }}</label>
                <input type="text" wire:model="m_name" class="form-control">
                @error('m_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('parents.m_name_en') }}</label>
                <input type="text" wire:model="m_name_en" class="form-control">
                @error('m_name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">{{ trans('parents.m_job') }}</label>
                <input type="text" wire:model="m_job" class="form-control">
                @error('m_job')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="title">{{ trans('parents.m_job_en') }}</label>
                <input type="text" wire:model="m_job_en" class="form-control">
                @error('m_job_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('parents.m_national_id') }}</label>
                <input type="text" wire:model.blur="m_national_id" class="form-control">
                @error('m_national_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('parents.m_passport_id') }}</label>
                <input type="text" wire:model.blur="m_passport_id" class="form-control">
                @error('m_passport_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('parents.m_phone') }}</label>
                <input type="text" wire:model.blur="m_phone" class="form-control">
                @error('m_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">{{ trans('parents.m_nationality') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="m_nationality">
                    <option selected>{{ trans('parents.choose') }}...</option>
                    @foreach ($nationalities as $nationality)
                        <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                    @endforeach
                </select>
                @error('m_nationality')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputState">{{ trans('parents.m_blood_type') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="m_blood_type">
                    <option selected>{{ trans('parents.choose') }}...</option>
                    @foreach ($blood_types as $blood_type)
                        <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                    @endforeach
                </select>
                @error('m_blood_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputZip">{{ trans('parents.m_religion') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="m_relgion">
                    <option selected>{{ trans('parents.choose') }}...</option>
                    @foreach ($religions as $religion)
                        <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                    @endforeach
                </select>
                @error('m_relgion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{ trans('parents.m_Address') }}</label>
            <textarea class="form-control" wire:model="m_address" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('m_Address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- @if ($updateMode)
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit_edit"
                type="button">{{ trans('parents.Next') }}
            </button>
        @else
        <button class="btn btn-success btn-sm s btn-lg pull-right" wire:click="submitFirstStep"
            type="button">{{ trans('parents.Next') }}
        </button>
        @endif --}}
        <div class="d-flex justify-content-between">

            <button class="btn btn-success btn-sm  btn-lg pull-right" wire:click="submitSecondStep()"
                type="button">{{ trans('parents.next') }}
            </button>
            <button class="btn btn-danger btn-sm s btn-lg pull-right" wire:click="back(1)"
                type="button">{{ trans('parents.previous') }}
            </button>
        </div>

    </div>
</div>
</div>
