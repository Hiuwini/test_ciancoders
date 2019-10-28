<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            
            <li class="nav-item {{ Route::currentRouteName()=='dashboard' ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('dashboard')}}">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Inicio</span>
                </a>
                <div class="triangle"></div>
            </li>

            @if((\Illuminate\Support\Facades\Auth::user()->rol) == 1 )
            <li class="nav-item {{ request()->is('register/*') ? 'active' : '' }}" data-item="users">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Add-UserStar"></i>
                    <span class="nav-text">Registro de Usuarios</span>
                </a>
                <div class="triangle"></div>
            </li>
            @endif

            @if((\Illuminate\Support\Facades\Auth::user()->rol) < 3 )
            <li class="nav-item">
                <a class="nav-item-hold {{ request()->is('scores/*') ? 'active' : '' }}" href="{{route('scores.index')}}">
                    <i class="nav-icon i-File-Edit"></i>
                    <span class="nav-text">Ingreso de notas</span>
                </a>
                <div class="triangle"></div>
            </li>
            @endif

            <li class="nav-item">
                <a class="nav-item-hold {{ request()->is('querys/*') ? 'active' : '' }}" href="#">
                    <i class="nav-icon i-Folder-Search"></i>
                    <span class="nav-text">Consulta de notas</span>
                </a>
                <div class="triangle"></div>
            </li>

            @if((\Illuminate\Support\Facades\Auth::user()->rol) < 3 )
            <li class="nav-item">
                <a class="nav-item-hold {{ request()->is('averages/*') ? 'active' : '' }}" href="#">
                    <i class="nav-icon i-Calculator-3"></i>
                    <span class="nav-text">Reporte de promedios</span>
                </a>
                <div class="triangle"></div>
            </li>
            @endif
            @if((\Illuminate\Support\Facades\Auth::user()->rol) == 1 )
            <li class="nav-item {{ request()->is('register/*') ? 'active' : '' }}" data-item="admin">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Gear"></i>
                    <span class="nav-text">Administrar</span>
                </a>
                <div class="triangle"></div>
            </li>
            @endif
            
        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Dashboards -->
        <ul class="childNav" data-parent="users">
            <li class="nav-item ">
                <a class="{{ Route::currentRouteName()=='professors' ? 'open' : '' }}" href="{{route('professors.index')}}">
                    <i class="nav-icon i-Professor"></i>
                    <span class="item-name">Catedraticos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='students' ? 'open' : '' }}" href="{{route('students.index')}}">
                    <i class="nav-icon i-Geek"></i>
                    <span class="item-name">Alumnos</span>
                </a>
            </li>
            
        </ul>
        
        <ul class="childNav" data-parent="admin">
           
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='courses' ? 'open' : '' }}" href="{{route('courses.index')}}">
                    <i class="nav-icon i-Diploma-2"></i>
                    <span class="item-name">Cursos</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='assignments' ? 'open' : '' }}" href="{{route('assignments.index')}}">
                    <i class="nav-icon i-Book"></i>
                    <span class="item-name">Asignaturas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='admins' ? 'open' : '' }}" href="#admins">
                    <i class="nav-icon i-Engineering"></i>
                    <span class="item-name">Administradores</span>
                </a>
            </li>
            
        </ul>

    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->