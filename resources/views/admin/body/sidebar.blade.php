@php
    $id = auth()->user()->id;
    $adminData = App\Models\User::find($id);
@endphp
<!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            <!-- User details -->
            <div class="user-profile text-center mt-3">
                <div class="">
                    <img src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/blank.jpg') }}" alt="" class="avatar-md rounded-circle">
                </div>
                <div class="mt-3">
                    <h4 class="font-size-16 mb-1">{{$adminData->name}}</h4>
                    <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
                </div>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{ route('dashboard') }}" class="waves-effect">
                            <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('home.slide') }}" class=" waves-effect">
                            <i class="ri-pantone-fill"></i>
                            <span>Slider</span>
                        </a>
                    </li>
        
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-user-2-fill"></i>
                            <span>About Setup</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('about') }}">About Details</a></li>
                            <li><a href="{{ route('about.images') }}">About Images</a></li>
                            <li><a href="{{ route('about.all.images') }}">About Images Listing</a></li>
                        </ul>
                    </li>
        
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-send-plane-fill"></i>
                            <span>Portfolio Setup</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('add.portfolio') }}">Add Portfolio</a></li>
                            <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-clipboard-line"></i>
                            <span>Blog Setup</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('blog.category') }}">Category</a></li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('add.blog') }}">Add Blog</a></li>
                        </ul>
                    </li>
        
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-layout-3-line"></i>
                            <span>Layouts</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('footer') }}">Footer</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
<!-- Left Sidebar End -->
