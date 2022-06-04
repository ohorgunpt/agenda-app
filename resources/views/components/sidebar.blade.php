<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Aplikasi TPN</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">TPN</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item active">
          <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Menu Master</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('unit.index') }}">Data Unit</a></li>
            <li><a class="nav-link" href="{{ route('personel.index') }}">Data Personel</a></li>
            <li><a class="nav-link" href="{{ route('agenda.index') }}">Data Agenda</a></li>
            <li><a class="nav-link" href="{{ route('data_dukung.index') }}">Data Dukung</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
          </ul>
        </li>
        <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
    </ul>
  </aside>
