<!-- <div class="custom-card card mb-3">
    <div class="card-body text-center">
        <form id="changeUserAvatarForm" action="#" method="POST" enctype="multipart/form-data">
            <div class="avatar mb-3">
                <img id="filePreview" src="{{ asset($user->avatar) }}" class="rounded-circle border" width="150"
                    height="150">
                <input id="selectedFileInput" data-id="{{ $user->id }}" class="billiongroup-user-avatar" type="file"
                    name="avatar" accept="image/png, image/jpg, image/jpeg" hidden>
                <span class="image-error-icon error-icon d-none"><i class="far fa-times-circle"></i></span>
            </div>
        </form>
        <div class="buttons">
            <button id="selectFileBtn" type="button" class="btn btn-secondary me-2"><i
                    class="fas fa-sync-alt me-2"></i>{{ admin_lang('Change') }}</button>
            <form class="d-inline" action="{{ route('admin.users.deleteAvatar', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="billiongroup-able-to-delete btn btn-danger"><i
                        class="fas fa-times me-2"></i>{{ admin_lang('Remove') }}</button>
            </form>
        </div>
    </div>
    <ul class="custom-list-group list-group list-group-flush border-top">
        <li class="list-group-item d-flex justify-content-between"><span>{{ admin_lang('Email ') }} :</span>
            <strong>{{ $user->email }}</strong>
        </li>
        <li class="list-group-item d-flex justify-content-between"><span>{{ admin_lang('Joined at') }} :</span>
            <strong>{{ dateFormat($user->created_at) }}</strong>
        </li>
    </ul>
</div> -->


<div class="w-full bg-dark rounded-lg shadow dark:bg-gray-800">
    <div class="flex justify-end px-4 pt-4">
    </div>
    <div class="flex flex-col items-center pb-10">
        <img id="filePreview" src="{{ asset($user->avatar) }}"  class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image"/>
        
                <input id="selectedFileInput" data-id="{{ $user->id }}" class="billiongroup-user-avatar" type="file"
                    name="avatar" accept="image/png, image/jpg, image/jpeg" hidden>
        <h5 class="mb-1 text-xl font-medium text-gray-200 dark:text-white">{{ $user->email }}</h5>
        <span class="text-sm text-gray-200 dark:text-gray-400"><strong>{{ dateFormat($user->created_at) }}</strong></span>
        <div class="flex mt-4 md:mt-6">
        <div class="buttons">
            <button id="selectFileBtn" type="button" class="btn btn-secondary me-2"><i
                    class="fas fa-sync-alt me-2"></i>{{ admin_lang('Change') }}</button>
            <form class="d-inline" action="{{ route('admin.users.deleteAvatar', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="billiongroup-able-to-delete btn btn-danger"><i
                        class="fas fa-times me-2"></i>{{ admin_lang('Remove') }}</button>
            </form>
        </div></div>
    </div>
    <a href="{{ route('admin.users.edit', $user->id) }}"
            class="list-group-item list-group-item-action d-flex justify-content-between {{ request()->routeIs('admin.users.edit') ? 'active' : '' }}">
            <span><i class="fa fa-edit me-2"></i>{{ admin_lang('Account details') }}</span>
            <span><i class="fas fa-angle-right"></i></span>
        </a>
        @if ($user->isSubscribed())
            <a class="list-group-item list-group-item-action d-flex justify-content-between"
                href="{{ route('admin.subscriptions.edit', $user->subscription->id) }}">
                <span><i class="far fa-gem me-2"></i>{{ admin_lang('Subscription') }}</span>
                <span><i class="fas fa-angle-right"></i></span>
            </a>
        @endif
        <a href="{{ route('admin.users.logs', $user->id) }}"
            class="list-group-item list-group-item-action d-flex justify-content-between {{ request()->routeIs('admin.users.logs') ? 'active' : '' }}">
            <span><i class="fas fa-list-ul me-2"></i>{{ admin_lang('Login logs') }}</span>
            <span><i class="fas fa-angle-right"></i></span>
        </a>
</div>
