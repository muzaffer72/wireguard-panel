@extends('backend.layouts.grid')
@section('title', admin_lang('Users'))
@section('container', 'container-xxl flex-grow-1 container-p-y')
@section('link', route('admin.users.create'))
@section('content')
  <div class="row">
    <div class="col-lg-6 col-sm-6 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex justify-content-left align-items-center">
          <div class="card-icon me-2">
            <span class="badge bg-label-primary rounded-pill p-2">
              <i class="ti ti-users ti-lg"></i>
            </span>
          </div>
          <div class="card-title mb-0">
            <h5 class="mb-0 me-2">{{ $activeUsersCount }}</h5>
            <small>{{ admin_lang('Active Users') }}</small>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-sm-6 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex justify-content-left align-items-center">
          <div class="card-icon me-2">
            <span class="badge bg-label-primary rounded-pill p-2">
              <i class="ti ti-users ti-lg"></i>
            </span>
          </div>
          <div class="card-title mb-0">
            <h5 class="mb-0 me-2">{{ $bannedUserscount }}</h5>
            <small>{{ admin_lang('Banned Users') }}</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-datatable table-responsive">
      <table class="dtable table border-top">
        <thead>
          <tr>
            <th>{{ admin_lang('Id') }}</th>
            <th>{{ admin_lang('User details') }}</th>
            <th>{{ admin_lang('Subscription') }}</th>
            <th>{{ admin_lang('Email status') }}</th>
            <th>{{ admin_lang('Account status') }}</th>
            <th>{{ admin_lang('Registered date') }}</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>
              <div class="d-flex justify-content-first align-items-center">
                <a class="me-2"
                  href="{{ route('admin.users.edit', $user->id) }}">
                  <img src="{{ asset($user->avatar) }}" alt="User" width="35"/>
                </a>
                <div>
                  <a class="text-reset"
                    href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a>
                  <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
              </div>
            </td>
            <td class="text-center">
              @if ($user->isSubscribed())
                @if ($user->subscription->isCancelled())
                  <div class="badge bg-lg-7">{{ admin_lang('Canceled') }}</div>
                @elseif ($user->subscription->isExpired())
                  <div class="badge bg-danger">{{ admin_lang('Expired') }}</div>
                @else
                  <span class="badge bg-lg-1">{{ admin_lang('Subscribed') }}</span>
                @endif
              @else
                <span class="badge bg-secondary">{{ admin_lang('Unsubscribed') }}</span>
              @endif
            </td>
            <td class="text-center">
              @if ($user->email_verified_at)
                <span class="badge bg-girl">{{ admin_lang('Verified') }}</span>
              @else
                <span class="badge bg-secondary">{{ admin_lang('Unverified') }}</span>
              @endif
            </td>
            <td class="text-center">
              @if ($user->status)
                <span class="badge bg-success">{{ admin_lang('Active') }}</span>
              @else
                <span class="badge bg-danger">{{ admin_lang('Banned') }}</span>
              @endif
            </td>
            <td class="text-center">{{ dateFormat($user->created_at) }}</td>
            <td>
              <div class="text-end">
                <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown"
                  aria-expanded="true">
                  <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-sm-end"
                  data-popper-placement="bottom-end">
                  <li>
                    <a class="dropdown-item"
                      href="{{ route('admin.users.edit', $user->id) }}"><i
                        class="fas fa-edit me-2"></i>{{ admin_lang('Edit Details') }}</a>
                  </li>
                  @if ($user->isSubscribed())
                    <li>
                      <a class="dropdown-item"
                        href="{{ route('admin.subscriptions.edit', $user->subscription->id) }}"><i
                          class="far fa-gem me-2"></i>{{ admin_lang('Subscription') }}</a>
                    </li>
                  @endif
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li>
                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                      method="POST">
                      @csrf @method('DELETE')
                      <button
                        class="billiongroup-able-to-delete dropdown-item text-danger"><i
                          class="far fa-trash-alt me-2"></i>{{ admin_lang('Delete') }}</button>
                    </form>
                  </li>
                </ul>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

    {{ $users->links() }}

    @push('style_vendor')
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    @endpush
    @push('scripts_libs')
      <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    @endpush
    @push('scripts')
      <script>
        $(".dtable").DataTable();
        $('.table-responsive').on('show.bs.dropdown', function () {
          $('.table-responsive').css( "overflow", "inherit" );
        });

        $('.table-responsive').on('hide.bs.dropdown', function () {
          $('.table-responsive').css( "overflow", "auto" );
        })
      </script>
    @endpush
@endsection
