@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="container-fluid position-relative px-0" style="margin-top: 90px; padding-top: 20px;">
        <div class="row g-0">
            
            @include('partials.LeftSide')

            <div class="col-lg-6 px-lg-5 pt-2 pb-5">
                
                <div class="selection-menu-wrapper py-3 mb-4"> 
                    <ul class="nav nav-pills justify-content-center mb-0" id="buouTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-section" type="button">HOME</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="about-tab" data-bs-toggle="tab" data-bs-target="#about-section" type="button">ABOUT</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="programs-tab" data-bs-toggle="tab" data-bs-target="#programs-section" type="button">PROGRAMS</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="faculty-tab" data-bs-toggle="tab" data-bs-target="#faculty-section" type="button">FACULTY</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="news-tab" data-bs-toggle="tab" data-bs-target="#news-section" type="button">NEWS</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="contacts-tab" data-bs-toggle="tab" data-bs-target="#contacts-section" type="button">CONTACTS</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="faqs-tab" data-bs-toggle="tab" data-bs-target="#faqs-section" type="button">FAQS</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="buouTabContent">

                    <!------------------>
                    <!-- Home Section -->
                    <!------------------>

                    @include('partials.Home')

                    <!------------------->
                    <!-- About Section -->
                    <!------------------->

                    @include('partials.About')

                    <!---------------------->
                    <!-- Programs Section -->
                    <!---------------------->

                    @include('partials.Programs')

                    <!--------------------->
                    <!-- Faculty Section -->
                    <!--------------------->

                    @include('partials.Faculty')

                    <!------------------>
                    <!-- News Section -->
                    <!------------------>

                    @include('partials.News')

                    <!---------------------->
                    <!-- Contacts Section -->
                    <!---------------------->

                    @include('partials.Contacts')

                    <!------------------>
                    <!-- FAQs Section -->
                    <!------------------>

                    @include('partials.FAQs')

                </div>
                 
            </div>

            <!--------------------->
            <!--CAROUSEL SECTION -->
            <!--------------------->

            @include('partials.RightSide')

            <!---------------->
            <!-- AI CHATBOT -->
            <!---------------->

            @include('partials.Chatbot')

        </div>
    </div>

    @include('layouts.footer')

@endsection