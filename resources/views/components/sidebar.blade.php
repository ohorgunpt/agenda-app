<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">A G E N D A</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#"></a>
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
            @if (Auth::user()->role=='superadmin' )
            <li><a class="nav-link" href="{{ route('unit.index') }}">Data Unit</a></li>
            <li><a class="nav-link" href="{{ route('personel.index') }}">Data Personel</a></li>
            <li><a class="nav-link" href="{{route('agenda.index')}}">Data Agenda</a></li>
            <li><a class="nav-link" href="{{route('category.index')}}">Data Kategori</a></li>

            {{-- <li><a class="nav-link" href="{{ route('data_dukung.index') }}">Data Dukung</a></li> --}}

            @elseif (Auth::user()->role=='tu_kepala')
            <li><a class="nav-link" href="{{route('agenda.index')}}">Data Agenda</a></li>
            <li><a class="nav-link" href="{{route('category.index')}}">Data Kategori</a></li>
            {{-- <li><a href="" class="nav-link">Page baru</a></li> --}}

            @elseif (Auth::user()->role =='dsp')
            <li><a class="nav-link" href="{{route('agenda.index')}}">Data Agenda</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>

            @elseif (Auth::user()->role =='humas')
            <li><a class="nav-link" href="{{route('agenda.index')}}">Data Agenda</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>

            @elseif (Auth::user()->role =='protokol')
            <li><a class="nav-link" href="{{route('agenda.index')}}">Data Agenda</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
            @elseif (Auth::user()->role =='tu_sestama')
            <li><a class="nav-link" href="{{route('agenda_all.index')}}">Agenda Sestama</a></li>

            @endif
          </ul>
        </li>
        {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}
    </ul>
  </aside>
