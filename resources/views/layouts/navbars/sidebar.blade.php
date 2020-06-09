<div class="sidebar" data-color="blue">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      {{ __('CRM') }}
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      {{ Auth::user()->name }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'client') active @endif">
        <a href="{{ route('client.index') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Clients') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'project') active @endif">
        <a href="{{ route('project.index') }}">
          <i class="now-ui-icons business_briefcase-24"></i>
          <p>{{ __('Projects') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'note') active @endif">
        <a href="{{ route('note.index') }}">
          <i class="now-ui-icons education_paper"></i>
          <p>{{ __('Notes') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'table') active @endif">
        <a href="{{ route('page.index','table') }}">
          <i class="now-ui-icons files_single-copy-04"></i>
          <p>{{ __('Documents') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'transaction') active @endif">
        <a href="{{ route('transaction.index') }}">
          <i class="now-ui-icons shopping_credit-card"></i>
          <p>{{ __('Transactions') }}</p>
        </a>
      </li>
      <li>
        <a data-toggle="collapse" href="#laravelExamples">
            <i class="now-ui-icons ui-1_settings-gear-63"></i>
          <p>
            {{ __("More") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExamples">
          <ul class="nav">
            <li class="@if ($activePage == 'currency') active @endif">
              <a href="{{ route('currency.index') }}">
                <i class="now-ui-icons business_money-coins"></i>
                <p> {{ __("Curriences") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'transactiontype') active @endif">
              <a href="{{ route('transactiontype.index') }}">
                <i class="now-ui-icons shopping_credit-card"></i>
                <p> {{ __("Transaction Type") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'incomesource') active @endif">
              <a href="{{ route('incomesource.index') }}">
                <i class="now-ui-icons media-2_sound-wave"></i>
                <p> {{ __("Income Sources") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'clientstatus') active @endif">
              <a href="{{ route('clientstatus.index') }}">
                <i class="now-ui-icons shopping_tag-content"></i>
                <p> {{ __("Clients Status") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'projectstatus') active @endif">
              <a href="{{ route('projectstatus.index') }}">
                <i class="now-ui-icons shopping_tag-content"></i>
                <p> {{ __("Project Status") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li>
        <a data-toggle="collapse" href="#laravelExamples">
            <i class="now-ui-icons ui-1_settings-gear-63"></i>
          <p>
            {{ __("Setting") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExamples">
          <ul class="nav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'users') active @endif">
              <a href="{{ route('user.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("User Management") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>