<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link {{ Request::is('operator/home') ? '' : 'collapsed' }} mb-3" href="{{ '/operator/home' }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('operator/document*') ? '' : 'collapsed' }} mb-3" href="{{ '/operator/document' }}">
            <i class="bi bi-journal-text"></i><span>Document</span>
        </a>
    </li>
    
</ul>

</aside>