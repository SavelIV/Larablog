<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->getRoleName(Auth::user()->role) . ': ' .  Auth::user()->name }}</a>
        </div>
    </div>
    <a class="btn btn-block btn-outline-danger" href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('cabinet.index') }}" class="nav-link">
                    <p>CABINET</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('likes.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-heart"></i>
                    <p>Liked Posts</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('comments.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-comment"></i>
                    <p>Comments</p>
                </a>
            </li>
        </ul>
    </nav>
</div>