<section>
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('main.add_parent') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('main.parents') }}</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div>

                        @if (!empty($success_message))
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">
                                    X
                                </button>
                                {{ $success_message }}
                            </div>
                        @endif
                        @if (!empty($catch_error))
                            <div class="alert alert-danger" id="danger-alert">
                                <button type="button" class="close" data-dismiss="alert">
                                    X
                                </button>
                                {{ $catch_error }}
                            </div>
                        @endif




                        <div class="stepwizard">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step">
                                    <a href="#step1" type="button"
                                        class="btn btn-circle {{ $current_step != 1 ? 'btn-default' : 'btn-success' }}">
                                        1
                                    </a>
                                    <p>{{ trans('parents.f_info') }}</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step2" type="button"
                                        class="btn btn-circle {{ $current_step != 2 ? 'btn-default' : 'btn-success' }}">
                                        2
                                    </a>
                                    <p> {{ trans('parents.m_info') }}</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step3" type="button"
                                        class="btn btn-circle {{ $current_step != 3 ? 'btn-default' : 'btn-success' }}">
                                        3
                                    </a>
                                    <p> {{ trans('parents.confirm_information') }}</p>
                                </div>
                            </div>
                        </div>

                        @include('livewire.father-form')

                        @include('livewire.mother-form')

                        @include('livewire.confirmation-form')


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
