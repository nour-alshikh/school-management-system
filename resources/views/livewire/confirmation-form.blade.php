@if ($current_step != 3)
    <div style="display: none" class="row setup-content" id="step-3">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>
        <div class="form-row">
            <div class="col">
                <label for="title">{{ trans('parents.email') }}</label>
                <input readonly type="email" wire:model="email" class="form-control">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('parents.password') }}</label>
                <input readonly type="password" wire:model="password" class="form-control">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="title">{{ trans('parents.f_name') }}</label>
                <input readonly type="text" wire:model="f_name" class="form-control">
                @error('f_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('parents.f_name_en') }}</label>
                <input readonly type="text" wire:model="f_name_en" class="form-control">
                @error('f_name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">{{ trans('parents.f_job') }}</label>
                <input readonly type="text" wire:model="f_job" class="form-control">
                @error('f_job')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="title">{{ trans('parents.f_job_en') }}</label>
                <input readonly type="text" wire:model="f_job_en" class="form-control">
                @error('f_job_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('parents.f_national_id') }}</label>
                <input readonly type="text" wire:model="f_national_id" class="form-control">
                @error('f_national_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('parents.f_passport_id') }}</label>
                <input readonly type="text" wire:model="f_passport_id" class="form-control">
                @error('f_passport_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('parents.f_phone') }}</label>
                <input readonly type="text" wire:model="f_phone" class="form-control">
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
                <select class="custom-select my-1 mr-sm-2" wire:model="f_relgion">
                    <option selected>{{ trans('parents.choose') }}...</option>
                    @foreach ($religions as $religion)
                        <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                    @endforeach
                </select>
                @error('f_relgion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{ trans('parents.f_Address') }}</label>
            <textarea readonly class="form-control" wire:model="f_address" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('f_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-row">
            <div class="col">
                <label for="title">{{ trans('parents.m_name') }}</label>
                <input readonly type="text" wire:model="m_name" class="form-control">
                @error('m_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('parents.m_name_en') }}</label>
                <input readonly type="text" wire:model="m_name_en" class="form-control">
                @error('m_name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">{{ trans('parents.m_job') }}</label>
                <input readonly type="text" wire:model="m_job" class="form-control">
                @error('m_job')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="title">{{ trans('parents.m_job_en') }}</label>
                <input readonly type="text" wire:model="m_job_en" class="form-control">
                @error('m_job_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('parents.m_national_id') }}</label>
                <input readonly type="text" wire:model="m_national_id" class="form-control">
                @error('m_national_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('parents.m_passport_id') }}</label>
                <input readonly type="text" wire:model="m_passport_id" class="form-control">
                @error('m_passport_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('parents.m_phone') }}</label>
                <input readonly type="text" wire:model="m_phone" class="form-control">
                @error('m_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">{{ trans('parents.m_nationality') }}</label>
                <select disabled class="custom-select my-1 mr-sm-2" wire:model="m_nationality">
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
                <select disabled class="custom-select my-1 mr-sm-2" wire:model="m_blood_type">
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
                <select disabled class="custom-select my-1 mr-sm-2" wire:model="m_relgion">
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
            <textarea readonly class="form-control" wire:model="m_address" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('Address_Father')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <h4>
                {{ trans('parents.confirm_message') }}
            </h4>
        </div>


        <div class="d-flex justify-content-between">
            <button class="btn btn-success btn-sm  btn-lg pull-right" wire:click="submitForm"
                type="button">{{ trans('parents.confirm') }}
            </button>
            <button class="btn btn-danger btn-sm  btn-lg pull-right" wire:click="back(1)"
                type="button">{{ trans('parents.previous') }}
            </button>
        </div>

    </div>
</div>
</div>
