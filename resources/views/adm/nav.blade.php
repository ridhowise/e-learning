 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-edit"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Game Programming <sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="{{ url('home') }}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

@if(Auth::User()->level_id=='1')

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Menu
</div>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item active"><a class="nav-link" href="{{ url('pertemuan') }}"><i class="fas fa-fw fa-users"></i><span>Pertemuan</span></a></li>
<li class="nav-item active"><a class="nav-link" href="{{ url('quiz') }}"><i class="fas fa-fw fa-file"></i><span>Quiz/Ujian</span></a></li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Manajement User
</div>
<li class="nav-item active"><a class="nav-link" href="{{ url('user') }}"><i class="fas fa-fw fa fa-user-circle"></i><span>Users</span></a></li>
<li class="nav-item active"><a class="nav-link" href="{{ url('level') }}"><i class="fas fa-fw fa fa-users-cog"></i><span>Role</span></a></li>
<li class="nav-item active"><a class="nav-link" href="{{ url('kelas') }}"><i class="fas fa-fw fa fa-door-closed"></i><span>Kelas</span></a></li>
<!--
<li class="nav-item active"><a class="nav-link" href="{{ url('setting') }}"><i class="fas fa-fw fa fa-cogs"></i><span>Setting</span></a></li>
-->
@elseif (Auth::User()->level_id=='2')

<!-- Heading -->
<div class="sidebar-heading">
  Menu
</div>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item active"><a class="nav-link" href="{{ url('pertemuan') }}"><i class="fas fa-fw fa-users"></i><span>Pertemuan</span></a></li>
<li class="nav-item active"><a class="nav-link" href="{{ url('quiz') }}"><i class="fas fa-fw fa-file"></i><span>Quiz/Ujian</span></a></li>
<li class="nav-item active"><a class="nav-link" href="{{url('user')}}/{{Auth::User()->id}}"><i class="fas fa-fw fa fa-door-closed"></i><span>Profile</span></a></li>

<!-- Divider -->
<hr class="sidebar-divider">
@else
<div class="sidebar-heading">
Menu
</div>
<li class="nav-item active"><a class="nav-link" href="{{ url('pertemuan') }}"><i class="fas fa-fw fa-users"></i><span>Pertemuan</span></a></li>
<li class="nav-item active"><a class="nav-link" href="{{ url('level') }}"><i class="fas fa-fw fa fa-book"></i><span>Mata Kuliah</span></a></li>

<!-- Divider -->
<hr class="sidebar-divider">
@endif

<li class="nav-item active"><a class="nav-link" href="{{ url('/logout') }}"><i class="fas fa-fw fa fa-times-circle"></i><span>Logout</span></a></li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
