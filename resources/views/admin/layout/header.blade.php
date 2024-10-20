<!DOCTYPE html>
<html lang="en">
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <!-- /Added by HTTrack -->
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
      <title>IATO- Admin Dashboard</title>
      <!-- General CSS Files -->
      <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
      <!-- Template CSS -->
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
      <!-- Custom style CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="{{asset('assets/bundles/pretty-checkbox/pretty-checkbox.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <!-- <link rel='shortcut icon' type='image/x-icon' href='assets/img/reppidxlogoicon.png' /> -->
      <!--<link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />-->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.all.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

      <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.4.2/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-+5b/xZ3OQhHfamps3tw08DlI5OFgTuUzPpaEZsw8TRItmaZIAE6GkbaFtJ7V1Qnp" crossorigin="anonymous">
      {{-- <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.4.2/dist/js/coreui.bundle.min.js" integrity="sha384-+Ug5YaEFOtOtIaZG8WkBSUnbFWwZrEkpXgJT1icRSEYUg3uBSsWiA8HHIVUvGzKv" crossorigin="anonymous"></script> --}}

    
      <meta name="csrf-token" content="{{ csrf_token() }}">
      
   </head>
   <style>
      .blance_cssbtn:hover{
      color:black !important;
      }
      body.modal-open .supreme-container{
      background-color: #F8F8F8;
      -webkit-filter: blur(1px);
      -moz-filter: blur(1px);
      -o-filter: blur(1px);
      -ms-filter: blur(1px);
      filter: blur(1px);
      }

      .light-sidebar .main-sidebar .sidebar-menu li ul.dropdown-menu li a:hover{
         color : #4682B4;
      }
      body{
         color: #000 !important;
      }
      i{
         color: #fff !important;
      }
   </style>
   <body class="sidebar-mini">
      <!-- <div class="loader"></div> -->
      <div id="app">
      <div class="main-wrapper main-wrapper-1 ">
      <div class="navbar-bg">
      </div>
      <nav class="navbar navbar-expand-lg main-navbar sticky supreme-container">
         <div class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
               <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                  collapse-btn"> <i data-feather="align-justify"></i></a></li>
               <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                  <i data-feather="maximize"></i>
                  </a>
               </li>
               <li>
                  
                  {{-- <form method="POST" class="form-inline mr-auto"  id="searchform" action="">
                      {!! csrf_field() !!}
                     <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search numbers" aria-label="Search" data-width="200" name="cateis">
                        <button class="btn" type="submit">
                        <i class="fas fa-search"></i>
                        </button>
                     </div>
                  </form> --}}
               </li>
            </ul>
         </div>
         <ul class="navbar-nav navbar-right">

            
           
            
            {{-- <li class="dropdown dropdown-list-toggle">
               <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
               <span class="badge headerBadge1">
               6 </span> </a>
               <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                  <div class="dropdown-header">
                     Messages
                     <div class="float-right">
                        <a href="#">Mark All As Read</a>
                     </div>
                  </div>
                  <div class="dropdown-list-content dropdown-list-message">
                     <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
                        text-white"> <img alt="image" src="assets/img/users/user-1.html" class="rounded-circle">
                     </span> <span class="dropdown-item-desc"> <span class="message-user">John
                     Deo</span>
                     <span class="time messege-text">Please check your mail !!</span>
                     <span class="time">2 Min Ago</span>
                     </span>
                     </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                     <img alt="image" src="assets/img/users/user-2.html" class="rounded-circle">
                     </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                     Smith</span> <span class="time messege-text">Request for leave
                     application</span>
                     <span class="time">5 Min Ago</span>
                     </span>
                     </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                     <img alt="image" src="assets/img/users/user-5.html" class="rounded-circle">
                     </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                     Ryan</span> <span class="time messege-text">Your payment invoice is
                     generated.</span> <span class="time">12 Min Ago</span>
                     </span>
                     </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                     <img alt="image" src="assets/img/users/user-4.html" class="rounded-circle">
                     </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                     Smith</span> <span class="time messege-text">hii John, I have upload
                     doc
                     related to task.</span> <span class="time">30
                     Min Ago</span>
                     </span>
                     </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                     <img alt="image" src="assets/img/users/user-3.html" class="rounded-circle">
                     </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                     Joshi</span> <span class="time messege-text">Please do as specify.
                     Let me
                     know if you have any query.</span> <span class="time">1
                     Days Ago</span>
                     </span>
                     </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                     <img alt="image" src="assets/img/users/user-2.html" class="rounded-circle">
                     </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                     Smith</span> <span class="time messege-text">Client Requirements</span>
                     <span class="time">2 Days Ago</span>
                     </span>
                     </a>
                  </div>
                  <div class="dropdown-footer text-center">
                     <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                  </div>
               </div>
            </li> --}}
            {{-- <li class="dropdown dropdown-list-toggle">
               <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
               </a>
               <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                  <div class="dropdown-header">
                     Notifications
                     <div class="float-right">
                        <a href="#">Mark All As Read</a>
                     </div>
                  </div>
                  <div class="dropdown-list-content dropdown-list-icons">
                     <a href="#" class="dropdown-item dropdown-item-unread"> <span class="dropdown-item-icon bg-primary text-white"> <i class="fas
                        fa-code"></i>
                     </span> <span class="dropdown-item-desc"> Template update is
                     available now! <span class="time">2 Min
                     Ago</span>
                     </span>
                     </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
                        fa-user"></i>
                     </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                     Sugiharto</b> are now friends <span class="time">10 Hours
                     Ago</span>
                     </span>
                     </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i class="fas
                        fa-check"></i>
                     </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                     moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                     Hours
                     Ago</span>
                     </span>
                     </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i class="fas fa-exclamation-triangle"></i>
                     </span> <span class="dropdown-item-desc"> Low disk space. Let's
                     clean it! <span class="time">17 Hours Ago</span>
                     </span>
                     </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
                        fa-bell"></i>
                     </span> <span class="dropdown-item-desc"> Welcome to Otika
                     template! <span class="time">Yesterday</span>
                     </span>
                     </a>
                  </div>
                  <div class="dropdown-footer text-center">
                     <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                  </div>
               </div>
            </li> --}}
            <li class="dropdown">
               <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{ asset('assets/img/user.png') }}" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
               <div class="dropdown-menu dropdown-menu-right pullDown">
                  <div class="dropdown-title">{{Auth::guard('admin')->user()->name}}</div>
                  <a href="{{route('admin.profile')}}" class="dropdown-item has-icon"> <i class="far
                     fa-user"></i> Profile
                  </a> 

                  {{-- <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                  Activities
                  </a>  --}}

                  {{-- <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                  Settings
                  </a> --}}

                  <div class="dropdown-divider"></div>
                  <a href="{{route('admin.logout')}}" class="dropdown-item has-icon text-danger logouttrigger"> <i class="fas fa-sign-out-alt"></i>
                  Logout
                  </a>
               </div>
            </li>
         </ul>
      </nav>
      <!--<div class="text-right" style="margin-right: 2%;margin-top: 8%;margin-left:20%;margin-bottom:-7%;">-->
      <!--  <i class="fa fa-envelope"></i> <strong>Email:</strong>-->
      <!--  customersupport@rappidx.com&nbsp; &nbsp; &nbsp; &nbsp;-->
      <!--  <i class="fa fa-phone"></i> <strong>Connect us at:</strong> +91 9289013918-->
      <!--</div>-->
      
      

<style>
   .validation{
      color: red;
   }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <!-- jQuery UI CSS (for styling the datepicker) -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<script>
jQuery.noConflict();
jQuery(document).ready(function($) {
    $(".datepicker").datepicker({
        dateFormat: 'dd-mm-yy',       
        constrainInput: false,       
        changeYear: true,             
        changeMonth: true,           
        yearRange: '1980:+0',        
        maxDate: 0,                  
        minDate: '-100Y',           
        showButtonPanel: true,       
        showOtherMonths: true,       
        selectOtherMonths: true     
    });
});

  </script>
  
<script>
   //   $(function() {
   //     $(".datepicker").datepicker({
    // 	 dateFormat: 'dd-mm-yy',
    // 	 constrainInput: false,
    // 	 changeYear:true,
    // 	 changeMonth:true,
    // 	 yearRange:'1980:+0',
    // 	 maxDate:10
    //  });
   //   });
   </script>
 
 <!-- All Input filed allowed -->
 
 <!-- card function -->
 <script>
 $('.card').on('keypress', function(e) {
     var regex = new RegExp("^[0-9]+$");
     var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
     var value = $(this).val() + key;
     
     if (!regex.test(key) || value.length > 8) {
         e.preventDefault();
         return false;
     }
 });
 </script>
 <!-- contact/mobile -->
 <script>

 </script>
 <!-- textarea -->
 <script>
 $('.textarea').on('keypress', function(e) {
     var regex = new RegExp("^[a-zA-Z-0-9]+$");
     var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
     var value = $(this).val() + key;
     
     if (!regex.test(key) || value.length > 100) {
         e.preventDefault();
         return false;
     }
 });
 </script>
 <!-- address -->
 <script>
 $('.address').on('keypress', function(e) {
     
     var regex = new RegExp("^[a-zA-Z0-9,&\\s-]+$");
 
 
     var value = $(this).val() + String.fromCharCode(e.which);
 
     if (!regex.test(value) || value.length > 100) {
         e.preventDefault();
         return false;
     }
 });
 </script>

 <script>
$(document).ready(function(e) {
$('.username').on('keypress', function(e) {
       
      //  alert('hello');
      var regex = new RegExp("^[a-zA-Z0-9,&\\s-]+$");
  
  
      var value = $(this).val() + String.fromCharCode(e.which);
  
      if (!regex.test(value) || value.length > 8) {
          e.preventDefault();
          return false;
      }
  });


  $('.name1').on('keypress', function(e) {
       
       //  alert('hello');
       var regex = new RegExp("^[a-zA-Z0-9,/>&\\s-]+$");
   
   
       var value = $(this).val() + String.fromCharCode(e.which);
   
       if (!regex.test(value) || value.length > 100) {
           e.preventDefault();
           return false;
       }
   });

  $('.name').on('keypress', function(e) {
       
       //  alert('hello');
       var regex = new RegExp("^[a-zA-Z0-9,&\\s-]+$");
   
   
       var value = $(this).val() + String.fromCharCode(e.which);
   
       if (!regex.test(value) || value.length > 100) {
           e.preventDefault();
           return false;
       }
   });

   $('.contact').on('keypress', function(e) {
     var regex = new RegExp("^[0-9]+$");
     var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
     var value = $(this).val() + key;
     
     if (!regex.test(key) || value.length > 10) {
         e.preventDefault();
         return false;
     }
 });


 $('.pincode').on('keypress', function(e) {
     var regex = new RegExp("^[0-9]+$");
     var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
     var value = $(this).val() + key;
     
     if (!regex.test(key) || value.length > 6) {
         e.preventDefault();
         return false;
     }
 });

 $('.port').on('keypress', function(e) {
     var regex = new RegExp("^[0-9]+$");
     var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
     var value = $(this).val() + key;
     
     if (!regex.test(key) || value.length > 3) {
         e.preventDefault();
         return false;
     }
 });


 $('.citizen').on('keypress', function(e) {
       
       //  alert('hello');
       var regex = new RegExp("^[a-zA-Z0-9,&\\s-]+$");
   
   
       var value = $(this).val() + String.fromCharCode(e.which);
   
       if (!regex.test(value) || value.length > 30) {
           e.preventDefault();
           return false;
       }
   });

   $('.form-control').on('keypress',function(e){
 var regex=new RegExp("^[a-zA-Z0-9.@&().,-/&* ]");
 var key=String.fromCharCode(!e.charCode ? e.which :e.charCode);
 if(!regex.test(key)){
     e.preventDefault();
     return false;
 }
 });

});

   </script>
   
      