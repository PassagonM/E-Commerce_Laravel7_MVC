@extends('layouts.cssandjs')
<?php
    $my_id = \Illuminate\Support\Facades\Auth::id();
    $countbasket = \App\basket::where('user_id', $my_id)->count();
?>
<header id="header" class="htc-header header--3 bg__white">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{asset('istemplate/images/logo/เมืองไทยการแว่น_1.png')}}" alt="logo">
                        </a>
                    </div>
                </div>
                <!-- Start MAinmenu Ares -->
                <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                    <nav class="mainmenu__nav hidden-xs hidden-sm">

                    </nav>
                </div>
                <!-- End MAinmenu Ares -->
                        @guest
                            <div class="col-md-5 col-sm-4 col-xs-3">
                                <ul class="menu-extra">
                                    <li><a href="{{route('login')}}"><span class="ti-shopping-cart"></span></a></li>
                                    <li><a href="{{ route('login') }}"><span class="ti-user"> Login</span></a></li>
                                </ul>
                            </div>
                        @else
                            <div class="col-md-5 col-sm-4 col-xs-3">
                                <ul class="menu-extra">
                                    <li><a href="{{route('basket.index',Auth::user()->id)}}"><span class="ti-shopping-cart"> {{$countbasket}}</span></a></li>
                                    <li>
                                        <a href="{{ route('profile.index')}}"><span class="ti-user"> {{ Auth::user()->name }}</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <span class="ti-power-off"></span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endguest
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>


