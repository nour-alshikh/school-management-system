@if ($current_step != 1)
    <div style="display: none" class="row setup-content" id="step-1">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <div class="form-row">
            <div class="col">
                <label for="title">{{ trans('parents.email') }}</label>
                <input type="email" wire:model.blur="email" class="form-control">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('parents.password') }}</label>
                <input type="password" wire:model.live="password" class="form-control">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="title">{{ trans('parents.f_name') }}</label>
                <input type="text" wire:model="f_name" class="form-control">
                @error('f_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('parents.f_name_en') }}</label>
                <input type="text" wire:model="f_name_en" class="form-control">
                @error('f_name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">{{ trans('parents.f_job') }}</label>
                <input type="text" wire:model="f_job" class="form-control">
                @error('f_job')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="title">{{ trans('parents.f_job_en') }}</label>
                <input type="text" wire:model="f_job_en" class="form-control">
                @error('f_job_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('parents.f_national_id') }}</label>
                <input type="text" wire:model.blur="f_national_id" class="form-control">
                @error('f_national_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('parents.f_passport_id') }}</label>
                <input type="text" wire:model.blur="f_passport_id" class="form-control">
                @error('f_passport_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('parents.f_phone') }}</label>
                <input type="text" wire:model.blur="f_phone" class="form-control">
                @error('f_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">{{ trans('parents.f_nationality') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="f_nationality">
                    <option selected>{{ trans('parents.choose') }}...</option>
                    @foreach ($nationalities as $nationality)
                        <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                    @endforeach
                </select>
                @error('f_nationality')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputState">{{ trans('parents.f_blood_type') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="f_blood_type">
                    <option selected>{{ trans('parents.choose') }}...</option>
                    @foreach ($blood_types as $blood_type)
                        <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                    @endforeach
                </select>
                @error('f_blood_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputZip">{{ trans('parents.f_religion') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="f_religion">
                    <option selected>{{ trans('parents.choose') }}...</option>
                    @foreach ($religions as $religion)
                        <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                    @endforeach
                </select>
                @error('f_religion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{ trans('parents.f_Address') }}</label>
            <textarea class="form-control" wire:model="f_address" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('f_address')
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
        @if ($update_mode)
            <button class="btn btn-success btn-sm s btn-lg pull-right" wire:click="submitEditFirstStep()"
                type="button">{{ trans('parents.next') }}
            </button>
        @else
            <button class="btn btn-success btn-sm s btn-lg pull-right" wire:click="submitFirstStep()"
                type="button">{{ trans('parents.next') }}
            </button>
        @endif

    </div>
</div>
</div>
