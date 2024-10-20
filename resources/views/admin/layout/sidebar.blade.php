<style>
    .asdffd{
    background-color:#4682B4 !important;
    }
    .nicescroll-cursors{
    height: 0px !important;
    }
    .sidebar-mini .main-sidebar  {
    width: 60px !important; 
    position: fixed !important;    
    left: 0 !important;  
    }
    .sidebar-mini .main-sidebar .sidebar-menu>li {
    padding: 3px !important;
    }
    /*.main-sidebar{*/
    /*    position: sticky !important;*/
    /*    top: 0px;*/
    /*}*/
 </style>

<div class="main-sidebar sidebar-style-2 supreme-container">
    <aside id="sidebar-wrapper">
       <div class="sidebar-brand">
          <a href="">
             <img alt="" src="" class="header-logo" style="height:50px;"/>
          <span class="logo-name ">
             {{-- <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> --}}
             Digi 
          </span>
          </a>
       </div>

       <ul class="sidebar-menu">
         <li class="dropdown ">
            <a href="{{route('admin.index')}}" class="nav-link  asdffd"><i data-feather="monitor"></i><span>Dashboard</span></a> 
         </li>

         <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown  "><i
               data-feather="calendar"></i><span>Master</span></a>
            <ul class="dropdown-menu" >
               
              
            </ul>
         </li>
         
         
         <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown  "><i
               data-feather="calendar"></i><span>CMS</span></a>
            <ul class="dropdown-menu" >
               <li><a class="nav-link " href="{{route('admin.menus')}}">Menu Master</a></li>
               <li><a class="nav-link " href="{{route('admin.submenus')}}">Submenu Master</a></li>
               <li><a class="nav-link " href="{{route('admin.pages')}}">Page Master</a></li>
               <li><a class="nav-link " href="{{route('admin.service')}}">Service Master</a></li>
               <li><a class="nav-link " href="{{route('admin.project')}}">Project Master</a></li>
               <li><a class="nav-link " href="{{route('admin.team')}}">Team Master</a></li>
              
            </ul>
         </li>
         
      </ul>
     
    </aside>
 </div>
 
 