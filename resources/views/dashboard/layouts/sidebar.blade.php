<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }} mb-3" href="{{ '/dashboard' }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/operators*') ? '' : 'collapsed' }} mb-3" href="{{ '/dashboard/operators' }}">
            <i class="bi bi-journal-text"></i><span>Operator</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/categories*') ? '' : 'collapsed' }} mb-3" href="{{ '/dashboard/categories' }}">
            <i class="bi bi-layout-text-window-reverse"></i><span>Category</span></i>
        </a>
    </li>
    
</ul>

</aside>