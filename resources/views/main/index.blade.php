@extends('layouts.main')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <h1 class="edica-page-title" data-aos="fade-up">This is LaraBLOG</h1>
                    <h4 class="comimg-soon-subtitle" data-aos="fade-up">Because it was created
                        <a href="{{ route('about') }}">using</a> the Laravel framework
                    </h4>
                    <section class="edica-coming-soon py-5 mb-5">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="comimg-soon-subtitle" data-aos="fade-up">
                                    This is my first time working with Laravel, and I'm always doing something
                                    <a href="https://saviv.site" target="_blank">new</a>
                                </h6>
                                <h6 class="comimg-soon-subtitle" data-aos="fade-up">
                                    And something new appears on this site periodically
                                </h6>
                                <div class="counter" data-aos="fade-up" data-aos-delay="200">
                                    <span class="days" id="days">12</span> :
                                    <span class="hours" id="hours">00</span> :
                                    <span class="minutes" id="minutes">00</span> :
                                    <span class="seconds" id="seconds">00</span>
                                </div>
                                <h6 class="subscription-title" data-aos="fade-up" data-aos-delay="300"
                                    data-aos-anchor-placement="center-bottom">Notify me of a new post:</h6>
                                <form class="form-inline subscription-form" data-aos="fade-up" data-aos-delay="400"
                                      data-aos-anchor-placement="center-bottom">
                                    <div class="form-group">
                                        <label for="email" class="sr-only">email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                               placeholder="email">
                                    </div>
                                    <button type="submit" class="btn btn-warning">Subscribe</button>
                                </form>
                            </div>
                            <div class="col-md-4" data-aos="fade-left">
                                <img src="{{ asset('assets/images/Under construction.png') }}" alt="coming soon" class="img-fluid">
                            </div>
                        </div>
                    </section>
                    <section class="edica-coming-soon py-5 mb-5">
                        <div class="row">
                            <h2 class="coming-soon-title" data-aos="fade-up" data-aos-delay="100">You can come and see
                                my <a href="{{ route('blog.index') }}">blog</a>
                            </h2>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('assets/js/timer.js') }}"></script>
@endsection
