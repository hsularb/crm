@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit project',
    'activePage' => 'project',
    'activeNav' => '',
])

@section('content')
    <div class="panel-header">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Project') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('project.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('project.update',$data->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <h6 class="heading-small text-muted mb-4">{{ __('Project') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{$data->name}}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Client') }}</label>
                                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="client_id">
                                        <option value="option_select" disabled selected>Clients</option>
                                        @foreach($client as $row)
                                            <option value="{{$row->id}}" {{$data->client_id == $row->id ? 'selected' : ''}}>{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                                    <input type="text" name="description" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ $data->description}}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'description'])
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Start date') }}</label>
                                    <input type="date" name="start_date" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Start date') }}" value="{{ $data->start_date }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'start date'])
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Budget') }}</label>
                                    <input type="text" name="budget" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Budget') }}" value="{{ $data->budget }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'Budget'])
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Project Status') }}</label>
                                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="status_id">
                                        <option value="option_select" disabled selected>Status</option>
                                        @foreach($status as $status)
                                            <option value="{{$status->id}}" {{$data->status_id == $status->id ? 'selected' : ''}}>{{$status->name}}</option>
                                        @endforeach
                                    </select>
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