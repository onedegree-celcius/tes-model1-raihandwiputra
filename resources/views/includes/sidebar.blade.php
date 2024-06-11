<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
        <li class="menu-header">Pages</li>
        <li class="{{ request()->routeIs('listpropinsi.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('listpropinsi.index') }}"><i class="far fa-square"></i> <span>List Propinsi</span></a></li>
        <li class="{{ request()->routeIs('listkontrasepsi.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('listkontrasepsi.index') }}"><i class="far fa-square"></i> <span>List Kontrasepsi</span></a></li>
        <li class="{{ request()->routeIs('listpemakaikontrasepsi.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('listpemakaikontrasepsi.index') }}"><i class="far fa-square"></i> <span>List Pemakai Kontrasepsi</span></a></li>
        </ul>
    </aside>
</div>