
@extends('admin.layout.master')

@section('web')
<style>
.main-footer {
    visibility: hidden;
}.all_orderborder{
    border-right:1px solid rgb(228 235 242);
}
</style>

<body>

    <div class="loader"></div>
    <div id="app">

        <div class="main-wrapper main-wrapper-1 supreme-container">
            <div class="navbar-bg">

            </div>

                        <!-- Main Content -->

            <div class="main-content">

                <section class="section" style="margin-top:-34px;">
                   
                      <div class="row ">

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4" style="background-color: #8ece8e;">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <a href=""
                                                    <h5 class="font-15" style="color:#000; text-decoration:none;">Total Web Quary</h5>
                                                     <h2 class="mb-3 font-18">{{$WebQuary}}</h2>
                                                     <h2 class="mb-0 font-18">&nbsp;</h2>
                                                    </a>
                                                    {{-- <p class="mb-0"><span class="col-green">18%</span>
                                                        Increase</p> --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="user/assets/img/banner/3.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                    </div>
                </section>

                
            
            </div>
    <!-- recharge model  -->


    <script src="../../unpkg.com/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
   <style>

  .modal-backdrop.show {

   opacity: 0 !important;

   z-index:0;

  }
  </style>
  <script>
   
 </script>

 @endsection