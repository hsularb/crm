@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Create transaction',
    'activePage' => 'transaction',
    'activeNav' => '',
])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Transactions') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('transaction.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('transaction.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Transaction') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Project') }}</label>
                                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="project_id">
                                        <option value="option_select" disabled selected>All Prjects</option>
                                        @foreach($project as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Income') }}</label>
                                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="income_source_id">
                                        <option value="option_select" disabled selected>All Income Sources</option>
                                        @foreach($income as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Amount') }}</label>
                                    <input type="text" name="amount" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Amount') }}" value="{{ old('name') }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'amount'])
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Currency') }}</label>
                                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="currency_id">
                                        <option value="option_select" disabled selected>All Currency</option>
                                        @foreach($currency as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Transaction Type') }}</label>
                                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="transaction_type_id">
                                        <option value="option_select" disabled selected>All Transaction Type</option>
                                        @foreach($type as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Transaction Date') }}</label>
                                    <input type="date" name="transaction_date" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Transaction Date') }}" value="{{ old('name') }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'transaction_date'])
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                                    <textarea type="text" name="description" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ old('name') }}" required autofocus></textarea>

                                    @include('alerts.feedback', ['field' => 'description'])
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection