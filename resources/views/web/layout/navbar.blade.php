 <!-- Navbar Start -->
 <div class="container-fluid bg-primary">
    <div class="container">
        <nav class="navbar navbar-dark navbar-expand-lg py-0">
            <a href="" class="navbar-brand">
                <h1 class="text-white fw-bold d-block">Digi<span class="text-secondary">Prologue</span> </h1>
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                <div class="navbar-nav ms-auto mx-xl-auto p-0">

                    @foreach($menus as $menu)

                    @if($menu->submenus->count())
                    {{-- <a href="" class="nav-item nav-link active text-secondary">Home</a> --}}

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ $menu->name }}</a>
                        @foreach($menu->submenus as $submenu)
                        @if($submenu->page)
                        <div class="dropdown-menu rounded">
                            <a href="blog.html" class="dropdown-item">{{ $submenu->name }}</a>
                        </div>
                        @endif
                        @endforeach

                    </div>

                    @else

                    @if($menu->page)

                    <a href="" class="nav-item nav-link active text-secondary"> {{ $menu->name }}</a>

                    @else

                    <a href="" class="nav-item nav-link active text-secondary"> {{ $menu->name }}</a>


                    @endif

                    @endif

                    @endforeach

                    {{-- <a href="" class="nav-item nav-link active text-secondary">Home</a> --}}
                    {{-- <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="service.html" class="nav-item nav-link">Services</a>
                    <a href="project.html" class="nav-item nav-link">Projects</a> --}}
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded">
                            <a href="blog.html" class="dropdown-item">Our Blog</a>
                            <a href="team.html" class="dropdown-item">Our Team</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div> --}}
                    {{-- <a href="contact.html" class="nav-item nav-link">Contact</a> --}}


                </div>
            </div>
            <div class="d-none d-xl-flex flex-shirink-0">
                <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                    <a href="" class="position-relative animated tada infinite">
                        <i class="fa fa-phone-alt text-white fa-2x"></i>
                        <div class="position-absolute" style="top: -7px; left: 20px;">
                            <span><i class="fa fa-comment-dots text-secondary"></i></span>
                        </div>
                    </a>
                </div>
                <div class="d-flex flex-column pe-4 border-end">
                    <span class="text-white-50">Have any questions?</span>
                    <span class="text-secondary">Call: + 91 85330 74414</span>
                </div>
                <div class="d-flex align-items-center justify-content-center ms-4 ">
                    <a href="#"><i class="bi bi-search text-white fa-2x"></i> </a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->