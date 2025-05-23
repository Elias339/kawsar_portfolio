<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user-secret me-2"></i>{{ Auth::user()->name }}
        <br>
        <div style="font-size: 15px;">
            Email : <span class="text-lowercase">{{ Auth::user()->email }}</span>
        </div>

    </div>
    <div class="text-center"></div>
    <div class="list-group list-group-flush my-3">
        <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action bg-transparent ">
            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
        </a>

        <a href="{{route('slider.index')}}" class="list-group-item list-group-item-action bg-transparent fw-bold">
            <i class="fas fa-sliders-h me-2"></i>Banner
        </a>

        <a href="{{route('projectCategory.index')}}" class="list-group-item list-group-item-action bg-transparent fw-bold">
            <i class="fas fa-th-list me-2"></i>Project Category
        </a>

        <a href="{{route('project.index')}}" class="list-group-item list-group-item-action bg-transparent fw-bold"><i
                class="fas fa-project-diagram me-2"></i>Projects
        </a>

        <a href="{{route('tool.index')}}" class="list-group-item list-group-item-action bg-transparent fw-bold">
            <i class="fas fa-tools me-2"></i>Tools
        </a>

        <a href="{{route('webSettings.index')}}" class="list-group-item list-group-item-action bg-transparent fw-bold">
            <i class="fas fa-cog me-2"></i></i>Web Settings
        </a>

        <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-power-off me-2"></i>Logout
        </a>

        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
            @csrf
        </form>

    </div>
</div>
<!-- /#sidebar-wrapper -->
