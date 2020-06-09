@extends('layouts.app', [
    'namePage' => 'Project Status',
    'class' => 'sidebar-mini',
    'activePage' => 'projectstatus',
])


@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('projectstatus.create') }}">{{ __('Add status') }}</a>
            <h4 class="card-title">{{ __('Project Status') }}</h4>
            <div class="col-12 mt-2">
              @include('alerts.success')
              @include('alerts.errors')
            </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th class="disabled-sorting text-right">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $row)
                  <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->name}}</td>
                      <td class="td-actions text-right">
                        <a type="button" href="#" rel="tooltip" class="btn btn-info btn-icon btn-sm btn-round" data-original-title="" title="">
                          <i class="now-ui-icons ui-1_zoom-bold"></i>
                        </a>
                        <a type="button" href="{{ route('projectstatus.edit',$row->id) }}" rel="tooltip" class="btn btn-success btn-icon btn-sm btn-round" data-original-title="" title="">
                          <i class="now-ui-icons ui-2_settings-90"></i>
                        </a>

                        <form action="{{ route('projectstatus.destroy', $row->id) }}" method="post" style="display:inline-block;" class ="delete-form">
                          @csrf
                          @method('delete')
                          <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm delete-button btn-round " data-original-title="" title="" onclick="confirm('{{ __('Are you sure you want to delete this user?') }}') ? this.parentElement.submit() : ''">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </form>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- end content-->
        </div>
      </div>
    </div>
  </div>
@endsection