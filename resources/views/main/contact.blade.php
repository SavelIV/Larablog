@extends('layouts.main')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <b>{{ $message }}</b>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <b>{{ $message }}</b>
                    </div>
                @endif
                <div class="col-lg-11 mx-auto">
                    <h1 class="edica-page-title" data-aos="fade-up">Contact</h1>
                    <section class="edica-contact py-5 mb-5">
                        <div class="row">
                            <form class="col-md-8 contact-form-wrapper" action="{{ route('send-mail') }}" method="POST">
                                @csrf
                                <h5 data-aos="fade-up">Contact form</h5>
                                <div class="row">
                                    <div class="form-group col-md-6" data-aos="fade-up">
                                        <label for="name">NAME</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               id="name" name="name"
                                               placeholder="Your full name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6" data-aos="fade-up">
                                        <label for="phone">PHONE</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                               id="phone" name="phone"
                                               placeholder="Phone">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6" data-aos="fade-up" data-aos-delay="100">
                                        <label for="email">EMAIL</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               id="email" name="email"
                                               placeholder="Email address">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6"
                                         data-aos="fade-up" data-aos-delay="100">
                                        <label for="subject">SUBJECT</label>
                                        <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                               id="subject" name="subject"
                                               placeholder="Subject">
                                        @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12"
                                         data-aos="fade-up" data-aos-delay="200">
                                        <label for="message">MESSAGE</label>
                                        <textarea name="message" id="message" rows="9"
                                                  class="form-control textarea @error('message') is-invalid @enderror"
                                                  placeholder="Write here..."></textarea>
                                        @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning btn-lg" data-aos="fade-up"
                                        data-aos-delay="300">Send Message
                                </button>
                            </form>
                            <div class="col-md-4 contact-sidebar" data-aos="fade-left">
                                <h5>Contact me</h5>
                                <p>Need assistance? I'm online but I don't know where I am right now...</p>
                                <p>Maybe here: 18 Rustaveli Street,<br> Batumi, GEORGIA</p>
                                <div class="embed-responsive embed-responsive-1by1 contact-map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d372.64542615362564!2d41.6349290586871!3d41.652211268408145!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40678640e03db435%3A0xaf2f1f3823f7744a!2s18%20Rustaveli%20Ave%2C%20Batumi%2C%20Georgia!5e0!3m2!1sen!2sin!4v1720865909161!5m2!1sen!2sin"
                                        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                                        aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
