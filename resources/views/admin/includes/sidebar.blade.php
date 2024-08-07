<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ url('/storage/' . Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ route('cabinet.index') }}" class="d-block">{{ Auth::user()->getRoleName(Auth::user()->role) . ': ' .  Auth::user()->name }}</a>
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
                <a href="{{ route('admin.index') }}" class="nav-link">
                    <p>DASHBOARD</p>
                </a>
            </li>
            @if (Auth::user()->role == \App\Models\User::ROLE_ADMIN)
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Users</p>
                        <span class="badge badge-info right">{{ $usersCount }}</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-image"></i>
                    <p>Categories</p>
                    <span class="badge badge-info right">{{ $catsCount }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tags.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-tags"></i>
                    <p>Tags</p>
                    <span class="badge badge-info right">{{ $tagsCount }}</span>
                </a>
            </li>
            <li class="nav-item" style="border-bottom: 1px solid #4f5962;">
                <a href="{{ route('posts.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-pen"></i>
                    <p>Posts</p>
                    <span class="badge badge-info right">{{ $postsCount }}</span>
                </a>
            </li>
            <li class="nav-item d-flex" style="border-bottom: 1px solid #4f5962;">
                <a href="{{ route('cabinet.index') }}" class="nav-link">
                    <p>CABINET</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('/') }}" class="nav-link">
                    <p>TO THE SITE</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
