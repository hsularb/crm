@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit note',
    'activePage' => 'note',
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
                                <h3 class="mb-0">{{ __('note') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('note.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('note.update',$data->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <h6 class="heading-small text-muted mb-4">{{ __('Note') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Project') }}</label>
                                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="project_id">
                                        <option value="option_select" disabled selected>Project</option>
                                        @foreach($project as $row)
                                            <option value="{{$row->id}}" {{$data->project_id == $row->id ? 'selected' : ''}}>{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Note') }}</label>
                                    <textarea type="text" name="note" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Note') }}" value="{{ old('name', $data->name) }}" required autofocus>{{$data->note}}</textarea>

                                    @include('alerts.feedback', ['field' => 'note'])
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