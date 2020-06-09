@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
  <div class="panel-header panel-header-lg">
    <!-- <canvas id="bigDashboardChart"></canvas> -->
  </div>
  <div class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Report</h4>
          </div>
          <div class="card-body">
            @foreach($month as $day => $data)
            <div class="text-left">
              {{\Carbon\Carbon::parse($day)->format('d F Y')}}
            </div>
            <div class="text-right">
              Total : 
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Amount
                  </th>
                  <th>
                    Income
                  </th>
                  <th>
                    Expense
                  </th>
                </thead>
                    @foreach($data as $value)
                      <tr>
                        <td>
                          {{$value->amount}}
                        </td>
                        <td>
                          Oud-Turnhout
                        </td>
                        <td>
                          12343
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
@endpush