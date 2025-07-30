@extends('layout.app')
@section('title','Mock test')
@section('content')
<style>
    .form-control:focus,
    .form-select:focus {
        box-shadow: none !important;
    }
</style>
<section id="hero" class="container-fluid bg-primary bg-opacity-10 pt-5 rounded-5">

    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-7 d-flex flex-column justify-content-center">

                <h1 style="font-weight: 600; line-height: 1.3;">Launch Your Own <span class="text-primary">MCQ
                        Mock Test Platform</span></h1>
                <p class="my-3 fs-5" style="color: #555555;">Create and host mock tests and quizzes under your
                    own subdomain in minutes.
                    No coding required.
                    <!-- <br> <span style="font-weight: 600;">Designed for institutions, teachers, and training centers.</span> -->
                </p>
                <div class="my-3 d-flex flex-wrap justify-content-start" style="gap: 15px;">
                    <button class="btn btn-primary px-4 py-2 me-2 mb-2" type="button" data-bs-toggle="modal"
                        data-bs-target="#getstarted">Get Started
                        &nbsp; <i class="bi bi-chevron-right"></i></button>
                    <a href="#explain">
                        <button class="btn btn-outline-primary px-4 py-2 mb-2" type="button">Watch Demo
                            <i class="bi bi-play"></i>
                        </button>
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="getstarted" tabindex="-1" aria-labelledby="getstartedLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="getstartedLabel">Get Started</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form action="{{ route('demorequest.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="fullname" name="full_name"
                                                        value="{{ old('full_name') }}" required>
                                                    @error('full_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="institutionname" class="form-label">Institution's Name</label>
                                                    <input type="text" class="form-control" name="institution_name"
                                                        id="institutionname" value="{{ old('institution_name') }}">
                                                    @error('institution_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Email address <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" name="email"
                                                        id="exampleInputEmail1" value="{{ old('email') }}" required>
                                                    @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="phone" name="phone_number"
                                                        value="{{ old('phone_number') }}" required>
                                                    @error('phone_number')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="desired_subdomain" class="form-label">Desired Subdomain <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            placeholder="subdomain" aria-label="Username"
                                                            id="desired_subdomain" name="desired_subdomain"
                                                            value="{{ old('desired_subdomain') }}" required>
                                                        <span class="input-group-text" id="basic-addon1">.mooktest.com</span>
                                                    </div>
                                                    @error('desired_subdomain')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <code>Max: 24 characters <br>
                                                        <span class="text-muted">Choose a unique subdomain for your site. It should be easy to remember and reflect your brand.</span>
                                                    </code>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="keywords" class="form-label">Keywords <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        id="keywords" name="keywords"
                                                        placeholder="e.g. language tests, loksewa, Civil Engeneer, Nursing, Banking, etc."
                                                        value="{{ old('keywords') }}" required>
                                                    @error('keywords')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <code><span class="text-muted">What fields will your platform cover? You can add multiple keywords separated by commas.</span></code>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Auto open modal if validation errors --}}
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        @if($errors -> any())
                        var myModal = new bootstrap.Modal(document.getElementById('getstarted'));
                        myModal.show();
                        @endif
                    });
                </script>

                <div class="my-3 d-flex flex-wrap" style="gap: 15px;">
                    <p><i class="bi bi-check-circle" style="color: #1AB08A;"></i>&nbsp; Live Mock Tests &
                        Quizzes</p>
                    <p><i class="bi bi-check-circle" style="color: #1AB08A;"></i>&nbsp; Advanced Analytics</p>
                    <p><i class="bi bi-check-circle" style="color: #1AB08A;"></i>&nbsp; Custom Branding</p>
                </div>
            </div>
            <div class="col-lg-5 d-flex justify-content-center justify-content-lg-end">
                <img src="assets/images/main-right-side.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section id="how-it-works" class="container-fluid  mt-5 pb-5 rounded-5">
    <style>
        .card {
            /* box-shadow: 0px 2px 12px 0px rgba(0, 0, 0, 0.1); */
            border-radius: 12px;
            transition: all 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 2px 12px 0px rgba(0, 0, 0, 0.2);
        }
    </style>
    <div class="container">
        <div class="row text-center flex-column mt-5">
            <h2 class="text-center title-head my-4" style="font-weight: 600;">How <span class="text-primary">It
                    Works</span></h2>

        </div>
        <div class="row align-items-stretch flex-wrap g-5 position-relative">
            <div class=" position-absolute top-50 start-0 translate-middle-y z-3 d-none d-xxl-flex justify-content-evenly align-items-center gap-3">
                <div><i class="bi bi-arrow-right text-primary" style="font-size: 25px;"></i></div>
                <div><i class="bi bi-arrow-right text-primary" style="font-size: 25px;"></i></div>
                <div><i class="bi bi-arrow-right text-primary" style="font-size: 25px;"></i></div>
            </div>


            <div class="col-12 col-md-6 col-xxl-3">
                <div class="card h-100 border-1 w-100">
                    <div class="card-body w-100 p-4 h-100">
                        <div class="my-3 d-flex justify-content-center align-items-center bg-primary text-white"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                            <h2 class="mb-0" style="font-size: 20px;">1</h2>
                        </div>
                        <h5 class="my-3" style="font-weight: 600;">Get Started</h5>
                        <p class="text-muted mb-auto flex-grow-1">Fill a short form with your details and
                            desired subdomain.</p>

                        <div class="mt-4">
                            <p class="d-flex align-items-start gap-2"><i class="bi bi-check-circle text-primary"></i> <span>Fill a short form</span></p>
                            <p class="d-flex align-items-start gap-2"><i class="bi bi-check-circle text-primary"></i> <span>Choose your subdomain</span></p>
                            <p class="d-flex align-items-start gap-2"><i class="bi bi-check-circle text-primary"></i> <span>Mention your quiz topic</span></p>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-1 d-block d-md-none"><i class="bi bi-arrow-down text-primary" style="font-size: 25px;"></i></div>
            </div>

            <div class="col-12 col-md-6 col-xxl-3">
                <div class="card h-100 border-1 w-100">
                    <div class="card-body w-100 p-4 h-100">
                        <div class="my-3 d-flex justify-content-center align-items-center bg-primary text-white"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                            <h2 class="mb-0" style="font-size: 20px;">2</h2>
                        </div>
                        <h5 class="my-3" style="font-weight: 600;">Get Approved</h5>
                        <p class="text-muted mb-auto flex-grow-1">We'll verify and set up your custom subdomain.
                        </p>

                        <div class="mt-4">
                            <p class="d-flex align-items-start gap-2"><i class="bi bi-check-circle text-primary"></i> <span>MookTest reviews your request</span></p>
                            <p class="d-flex align-items-start gap-2"><i class="bi bi-check-circle text-primary"></i> <span>Subdomain is assigned</span></p>
                            <p class="d-flex align-items-start gap-2"><i class="bi bi-check-circle text-primary"></i> <span>Setup link emailed to you</span></p>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-1 d-block d-md-none"><i class="bi bi-arrow-down text-primary" style="font-size: 25px;"></i></div>
            </div>

            <div class="col-12 col-md-6 col-xxl-3">
                <div class="card h-100 border-1 w-100">
                    <div class="card-body w-100 p-4 h-100">
                        <div class="my-3 d-flex justify-content-center align-items-center bg-primary text-white"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                            <h2 class="mb-0" style="font-size: 20px;">3</h2>
                        </div>
                        <h5 class="my-3" style="font-weight: 600;">Customize</h5>
                        <p class="text-muted mb-auto flex-grow-1">Upload your logo, choose colors, write your
                            intro, and more.</p>


                        <div class="mt-4">
                            <p class="d-flex align-items-start gap-2"><i class="bi bi-check-circle text-primary"></i> <span>Upload logo & banner</span></p>
                            <p class="d-flex align-items-start gap-2"><i class="bi bi-check-circle text-primary"></i> <span>Choose color scheme</span></p>
                            <p class="d-flex align-items-start gap-2"><i class="bi bi-check-circle text-primary"></i> <span>Add contact & intro text</span></p>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-1 d-block d-md-none"><i class="bi bi-arrow-down text-primary" style="font-size: 25px;"></i></div>
            </div>

            <div class="col-12 col-md-6 col-xxl-3">
                <div class="card h-100 border-1 w-100">
                    <div class="card-body w-100 p-4 h-100">
                        <div class="my-3 d-flex justify-content-center align-items-center bg-primary text-white"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                            <h2 class="mb-0" style="font-size: 20px;">4</h2>
                        </div>
                        <h5 class="my-3" style="font-weight: 600;">Launch</h5>
                        <p class="text-muted mb-auto flex-grow-1">Create quizzes and let students take them
                            online — free or paid!</p>



                        <div class="mt-4">
                            <p class="d-flex align-items-start gap-2"><i class="bi bi-check-circle text-primary"></i> <span>Create MCQs & test sets</span></p>
                            <p class="d-flex align-items-start gap-2"><i class="bi bi-check-circle text-primary"></i> <span>Choose free or paid model</span></p>
                            <p class="d-flex align-items-start gap-2"><i class="bi bi-check-circle text-primary"></i> <span>Share your link with students</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="explain" class="container-fluid bg-primary bg-opacity-10  my-5 rounded-5">
    <style>
        #explain {
            scroll-margin-top: 50px;
        }
    </style>
    <div class="container text-center py-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-3" style="font-weight: 600;">Explain in 2 Mins</h2>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <iframe style="aspect-ratio: 16/9; border-radius: 12px;" width="100%"
                    src="https://www.youtube.com/embed/VIDEO_ID" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<section id="description" class="container-fluid my-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-12 text-center">
                <h2 class="mb-4" style="font-weight: 600;">The Ultimate Platform to Launch Your <span
                        class="text-primary">MCQ Storefront</span></h2>
                <p class="text-muted mb-4 mx-auto" style="font-size: 20px; max-width: 990px;">Advanced tools designed to help you create, package, and sell multiple-choice questions, providing a seamless experience for you and your customers.</p>
            </div>
        </div>
        <div class="row g-5 mb-5">
            <div class="col-12 col-md-6 col-lg-4 d-flex align-items-center">
                <div>
                    <img class="img-fluid " src="{{ asset('assets/images/ill-1.png"') }}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8 d-flex flex-column justify-content-center align-items-start">

                <h4>Create & Organize Question Banks</h4>
                <p style="color: #333333;">Effortlessly build vast question banks. Organize MCQs by subject, topic, or difficulty level. Invite subject matter experts and authors to collaborate in a centralized, easy-to-use workspace, ensuring high-quality content for your tests.</p>

            </div>
        </div>
        <div class="row g-5 flex-row-reverse mb-5">
            <div class="col-12 col-md-6 col-lg-4 d-flex align-items-center">
                <div class="text-end">
                    <img class="img-fluid " src="{{ asset('assets/images/ill-2.png') }}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8 d-flex flex-column justify-content-center align-items-start">

                <h4>Package & Sell Your Quizzes</h4>
                <p style="color: #333333;">Bundle your MCQs into marketable test packages, mock tests, or topic-wise quizzes. Set custom pricing, create subscription models, and publish them directly to your branded storefront. Our platform makes monetizing your content simple and effective.</p>

            </div>
        </div>
        <div class="row g-5">
            <div class="col-12 col-md-6 col-lg-4 d-flex align-items-center">
                <div>
                    <img class="img-fluid" style="max-width: 300px;" src="{{ asset('assets/images/ill-3.png') }}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8 d-flex flex-column justify-content-center align-items-start">

                <h4>Customize Your Test Experience</h4>
                <p style="color: #333333;">Package & Sell Your Quizzes Effortlessly build vast question banks. Organize MCQs by subject, topic, or difficulty level. Invite subject matter experts and authors to collaborate in a centralized, easy-to-use workspace, ensuring high-quality content for your tests.</p>

            </div>
        </div>
    </div>
</section>



<section id="faq" class="container mt-5">
    <style>
        #faq {
            scroll-margin-top: 50px;
        }

        #faq .accordion-button {
            font-weight: 500;
            background-color: #FAFAFA;
        }

        #faq .accordion-item {
            margin-bottom: 1rem;
            border-radius: 12px;
            outline: none;
            border: 1px solid #e3e3e3;
            overflow: hidden;
        }

        #faq .accordion-button:focus {
            outline: none;
            box-shadow: none;
        }

        #faq .faq-number {
            background-color: var(--bs-primary);
            padding: 10px 20px;
            color: white;
            border-radius: 500px;
            font-size: 18px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #faq .faq-question {
            font-weight: 500;
            font-size: 24px;
            color: #1A1A1A;
        }
    </style>
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="mb-4" style="font-weight: 600;">Frequently Asked <span class="text-primary">Questions</span></h2>
        </div>
    </div>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    <div class="d-flex align-items-center gap-4">
                        <span class="faq-number">1</span>
                        <span class="faq-question">What is MookTest?</span>
                    </div>
                </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body px-5 pt-4">
                    <p class="fs-4">MookTest is a platform that lets teachers, institutions, and coaching centers create their own branded mock test or quiz site under a subdomain (e.g., <code>youracademy.mooktest.com</code>). You can create, manage, and sell MCQ-based quizzes to students online.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                    <div class="d-flex align-items-center gap-4">
                        <span class="faq-number">2</span>
                        <span class="faq-question">Do I need any technical skills to use MookTest?</span>
                    </div>
                </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body px-5 pt-4">
                    <p class="fs-4">No! MookTest is designed for non-technical users. You can customize your site, add quizzes, and manage everything using a simple content management system (CMS) — no coding required.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    <div class="d-flex align-items-center gap-4">
                        <span class="faq-number">3</span>
                        <span class="faq-question">Can I charge students for quizzes?</span>
                    </div>
                </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body px-5 pt-4">
                    <p class="fs-4">Yes. You can choose to offer your quizzes for free or set your own prices. MookTest supports both free and paid mock test access options.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    <div class="d-flex align-items-center gap-4">
                        <span class="faq-number">4</span>
                        <span class="faq-question">How long does it take to get my subdomain approved?</span>
                    </div>
                </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body px-5 pt-4">
                    <p class="fs-4">After you submit your request, our team will review it and typically respond within 24 hours. If your desired subdomain is available and appropriate, you’ll receive a link to set up your site.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                    <div class="d-flex align-items-center gap-4">
                        <span class="faq-number">5</span>
                        <span class="faq-question">What kind of subjects can I create quizzes for?</span>
                    </div>
                </button>
            </h2>
            <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body px-5 pt-4">
                    <p class="fs-4">You can create quizzes on any subject you specialize in — from school-level topics to test prep (like IELTS, entrance exams, nursing, engineering, etc.). Just let us know your focus during signup.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="ready-to-get-started" class="my-5 bg-primary bg-opacity-10 rounded-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center title-head mb-3" style="font-weight: 600;">Ready to Get Started?</h2>
                <p class="mx-auto"
                    style="font-size: 20px; max-width: 990px; text-align: center; color: #555555;">
                    Join thousands of educators who trust MookTest.</p>

                <div class="text-center d-flex justify-content-center align-items-center gap-4 flex-wrap">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#getstarted" class="btn btn-primary btn-lg px-5">Start Free Trial</button>
                    <a href="" class="btn btn-outline-primary btn-lg px-5">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>


</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>
</body>

</html>

@endsection