@extends('layout.app')
@section('title','Mock test-About Us')
@section('content')
<style>
    .form-control:focus,
    .form-select:focus {
        box-shadow: none !important;
    }

    p {
        margin-bottom: 1rem;
    }

    li {
        margin-bottom: 0.5rem;
    }
</style>

<main class="pt-5 bg-light">
    <!-- About Us Section -->
    <section id="about-us" class="container py-5">
        <div class="row pt-5">
            <div class="col-12">
                <h1>About Us – MookTest</h1>
                <p>
                    <strong>MookTest</strong> is a modern SaaS platform designed to help <strong>educators,
                        institutions, and trainers</strong> launch their own branded mock test or quiz site —
                    without any technical hassle.
                </p>
                <p>
                    Whether you're a teacher preparing students for competitive exams or an institution conducting
                    internal assessments, MookTest lets you set up a dedicated subdomain (like
                    <code>youracademy.mooktest.com</code>), customize your platform, and publish MCQ-based quizzes
                    with ease.
                </p>

                <h2 class="mt-5">What We Do</h2>
                <p>We provide a simple, no-code solution for:</p>
                <ul class="list-unstyled ms-3">
                    <li>🎓 <strong>Coaching institutes</strong> creating test prep platforms for entrance and board
                        exams</li>
                    <li>👩‍🏫 <strong>Independent educators</strong> offering paid or free mock tests to students
                        online</li>
                    <li>🏫 <strong>Academic institutions</strong> conducting practice tests and evaluations</li>
                    <li>🌐 <strong>Edtech consultants</strong> building niche testing solutions for clients</li>
                </ul>

                <p>
                    With MookTest, you get a fully customizable CMS, the ability to organize quizzes by subject or
                    topic, set prices, and track student results — all in one clean, mobile-friendly interface.
                </p>

                <h2 class="mt-5">Our Mission</h2>
                <p>
                    To make high-quality online testing tools accessible to every educator by offering
                    <strong>scalable, customizable, and affordable quiz platforms</strong> — no developers needed.
                </p>

                <h2 class="mt-5">Our Vision</h2>
                <p>
                    To become the go-to mock test hosting platform for teachers and institutions across Asia —
                    helping them <strong>scale their reach, brand, and impact</strong> through digital assessments.
                </p>

                <h2 class="mt-5">Why Choose MookTest?</h2>
                <ul class="list-unstyled ms-3">
                    <li>🧠 <strong>No-Code Setup</strong>: Launch your test platform in minutes</li>
                    <li>🌐 <strong>Your Own Subdomain</strong>: Create your brand (e.g.,
                        <code>yourname.mooktest.com</code>)
                    </li>
                    <li>🎨 <strong>Customization Tools</strong>: Logo, colors, homepage text & more</li>
                    <li>📚 <strong>Quiz Builder</strong>: Organize MCQs into sets, mock tests, or full exams</li>
                    <li>💳 <strong>Free or Paid Tests</strong>: Set pricing and collect payments</li>
                    <li>📈 <strong>Student Analytics</strong>: Track results, scores, and engagement</li>
                </ul>

                <p>
                    At <strong>MookTest</strong>, we believe that knowledge deserves a platform. Join the growing
                    number of educators turning their content into powerful online test portals — with zero friction
                    and full control.
                </p>


            </div>
        </div>
    </section>
</main>

@endsection