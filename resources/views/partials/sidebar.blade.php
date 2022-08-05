<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('home') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> {{ __('Dashboard') }}</a></li>

            <li class="c-sidebar-nav-title">{{ __('Manage Todo-List') }}</li>

                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown c-show">

                        <li class="c-sidebar-nav-item">
                            <a class="c-sidebar-nav-link"
                               href="{{route('taskGroup.create')}}">{{ __('New Task group') }}</a>
                        </li>

                </li>
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link" href="{{route('task.create')}}">{{ __('New Task') }}</a>
            </li>


        <li class="c-sidebar-nav-title">{{__('Others')}}</li>

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
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
