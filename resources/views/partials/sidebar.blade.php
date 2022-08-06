<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <ul class="c-sidebar-nav">

        <li class="c-sidebar-nav-title">{{ __('Manage Todo list ') }}</li>
        <div class="p-3">

            <a class="btn btn-primary" href="{{ route('user.taskGroup.index') }}">Task Groups</a>
        </div>
        <div class="p-3">
            <a class="btn btn-primary" href="{{ route('user.task.index') }}">My Tasks</a>
        </div>
        {{-- @foreach (\App\Models\TaskGroup::all() as $group)
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown c-show">
                <a class="c-sidebar-nav-link" href="{{ route('user.taskGroup.edit', $group->id) }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-folder-open') }}"></use>
                    </svg> {{ $group->name }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @foreach ($group->tasks as $task)
                        <li class="c-sidebar-nav-item">
                            <a class="c-sidebar-nav-link" style="padding: .5rem .5rem .5rem 76px" href="">
                                <svg class="c-sidebar-nav-icon">
                                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-list') }}"></use>
                                </svg>
                                {{ $task->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach --}}

        <li class="c-sidebar-nav-title">{{ __('Others') }}</li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href=""
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> {{ __('Logout') }}
            </a>
            <form id="logout-form" action="" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
