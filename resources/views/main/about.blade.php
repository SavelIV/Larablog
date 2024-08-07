@extends('layouts.main')
@section('content')
    <main class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <h1 class="edica-page-title" data-aos="fade-up">About This Project</h1>
                    <section class="edica-about-intro py-5">
                        <div class="row">
                            <div class="col-md-6" data-aos="fade-right" data-aos-delay="150">
                                <h2 class="intro-title pb-3 pb-md-0 mb-4 mb-md-0">This is a small blog for sharing various information,  <span>built on Laravel framework.</span>
                                </h2>
                            </div>
                            <div class="col-md-6 intro-content" data-aos="fade-left" data-aos-delay="150">
                                <p><span class="first-letter">T</span>he goal is to keep photo diaries online, the ability to make friends and make acquaintances, share photos and impressions.</p>
                            </div>
                        </div>
                    </section>
                    <section class="edica-about-faq py-5 mb-5">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-md-0 d-flex flex-column justify-content-center"
                                 data-aos="fade-right">
                                <h2 class="goal-title">My Achievements here:</h2>
                                <div class="accordion" id="edicaAboutFaqCollapse" role="tablist" aria-multiselectable="true">
                                    <div class="card" data-aos="fade-up" data-aos-delay="200">
                                        <div class="card-header" role="tab" id="edicaAboutFaq1">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#edicaAboutFaqCollapse"
                                                   href="#edicaAboutFaqContent1" aria-expanded="true"
                                                   aria-controls="edicaAboutFaqContent1">
                                                    Role-based access control (RBAC)
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="edicaAboutFaqContent1" class="collapse in" role="tabpanel"
                                             aria-labelledby="edicaAboutFaq1">
                                            <div class="card-body">
                                                <p>Reader - a registered user who has a personal cabinet with the ability to edit his comments and liked posts,</p>
                                                <p>Moderator - the same user, but with the additional ability to log into the control panel to edit posts, categories and tags,</p>
                                                <p>Admin - the main administrator, who additionally has the ability to manage users</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" data-aos="fade-up" data-aos-delay="300">
                                        <div class="card-header" role="tab" id="edicaAboutFaq3">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#edicaAboutFaqCollapse"
                                                   href="#edicaAboutFaqContent3" aria-expanded="false"
                                                   aria-controls="edicaAboutFaqContent1">
                                                    Integrated Intervention Image Library
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="edicaAboutFaqContent3" class="collapse" role="tabpanel"
                                             aria-labelledby="edicaAboutFaq3">
                                            <div class="card-body">
                                                For creating image thumbnails, setting watermarks and formatting large image files
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" data-aos="fade-up" data-aos-delay="400">
                                        <div class="card-header" role="tab" id="edicaAboutFaq4">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#edicaAboutFaqCollapse"
                                                   href="#edicaAboutFaqContent4" aria-expanded="false"
                                                   aria-controls="edicaAboutFaqContent1">
                                                    Sending emails from site
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="edicaAboutFaqContent4" class="collapse" role="tabpanel"
                                             aria-labelledby="edicaAboutFaq4">
                                            <div class="card-body">
                                                The simple API is built on the popular Swiftmailer library, configured to use SMTP
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" data-aos="fade-up" data-aos-delay="500">
                                        <div class="card-header" role="tab" id="edicaAboutFaq5">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#edicaAboutFaqCollapse"
                                                   href="#edicaAboutFaqContent5" aria-expanded="false"
                                                   aria-controls="edicaAboutFaqContent1">
                                                    The ability to comment and like new posts
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="edicaAboutFaqContent5" class="collapse" role="tabpanel"
                                             aria-labelledby="edicaAboutFaq5">
                                            <div class="card-body">
                                                There's nothing more to add
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" data-aos="fade-up" data-aos-delay="500">
                                        <div class="card-header" role="tab" id="edicaAboutFaq6">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#edicaAboutFaqCollapse"
                                                   href="#edicaAboutFaqContent6" aria-expanded="false"
                                                   aria-controls="edicaAboutFaqContent1">
                                                    Using Laravel Telescope to optimize queries
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="edicaAboutFaqContent6" class="collapse" role="tabpanel"
                                             aria-labelledby="edicaAboutFaq6">
                                            <div class="card-body">
                                                and other useful things
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" data-aos="fade-up" data-aos-delay="600">
                                        <div class="card-header" role="tab" id="edicaAboutFaq7">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#edicaAboutFaqCollapse"
                                                   href="#edicaAboutFaqContent7" aria-expanded="false"
                                                   aria-controls="edicaAboutFaqContent1">
                                                    Technology stack
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="edicaAboutFaqContent7" class="collapse" role="tabpanel"
                                             aria-labelledby="edicaAboutFaq7">
                                            <div class="card-body">
                                                <p>Laravel 9, of course</p>
                                                <p>MySQL</p>
                                                <p>Bootstrap 5</p>
                                                <p>Redis</p>
                                                <p>Cron</p>
                                                <p>Queue</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" data-aos="fade-up" data-aos-delay="700">
                                        <div class="card-header" role="tab" id="edicaAboutFaq8">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#edicaAboutFaqCollapse"
                                                   href="#edicaAboutFaqContent8" aria-expanded="false"
                                                   aria-controls="edicaAboutFaqContent1">
                                                    And a bonus for those who read this far
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="edicaAboutFaqContent8" class="collapse" role="tabpanel"
                                             aria-labelledby="edicaAboutFaq8">
                                            <div class="card-body">
                                                <p>To login as Reader and look inside:</p>
                                                <p>reader@mail.ru | 11111111</p>
                                                <p>To login as Moderator:</p>
                                                <p>moderator@mail.ru | 11111111</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-left">
                                <img src="{{ asset('assets/images/about-goal.png') }}" alt="goal" class="img-fluid">
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
