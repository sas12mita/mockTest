@extends('layout.app')
@section('title','Mock test')
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
    <section id="about-us" class="container py-5">
        <div class="row pt-5">
            <div class="col-12"></div>
            <h1>Terms & Conditions – MookTest</h1>

            <p>
                Welcome to <strong>MookTest</strong>. By accessing or using our platform, services, and websites (including any subdomains under <code>mooktest.com</code>), you agree to be bound by the following Terms & Conditions. Please read them carefully before using our services.
            </p>

            <h2 class="mt-4">1. Eligibility</h2>
            <p>
                To use MookTest, you must be at least 18 years old or have legal parental/guardian consent. You must also provide accurate, current information when signing up or requesting a subdomain.
            </p>

            <h2 class="mt-4">2. Account & Subdomain Usage</h2>
            <ul class="list-unstyled ms-3">
                <li>✔️ Each institution or educator is responsible for the content published under their assigned subdomain (e.g., <code>yourname.mooktest.com</code>).</li>
                <li>✔️ You must not impersonate others, use misleading information, or publish prohibited content.</li>
                <li>✔️ MookTest reserves the right to reject or revoke subdomains deemed inappropriate or in violation of our policies.</li>
            </ul>

            <h2 class="mt-4">3. Content Ownership</h2>
            <p>
                All MCQs, quizzes, and media uploaded by you remain your intellectual property. By hosting them on MookTest, you grant us a non-exclusive license to display and deliver the content to students through our platform.
            </p>

            <h2 class="mt-4">4. Payments & Pricing</h2>
            <ul class="list-unstyled ms-3">
                <li>✔️ You may choose to offer quizzes for free or set your own pricing.</li>
                <li>✔️ MookTest may deduct a platform fee or transaction fee where applicable, which will be clearly communicated.</li>
                <li>✔️ You are responsible for ensuring your pricing complies with local tax and regulatory requirements.</li>
            </ul>

            <h2 class="mt-4">5. Prohibited Activities</h2>
            <p>
                Users must not engage in activities such as:
            </p>
            <ul class="list-unstyled ms-3">
                <li>🚫 Uploading offensive, harmful, or plagiarized content</li>
                <li>🚫 Attempting to disrupt, hack, or misuse the platform infrastructure</li>
                <li>🚫 Violating copyright or intellectual property rights of others</li>
            </ul>

            <h2 class="mt-4">6. Service Availability</h2>
            <p>
                While we strive for uninterrupted service, MookTest does not guarantee 100% uptime. Maintenance, updates, or unforeseen issues may lead to temporary disruptions.
            </p>

            <h2 class="mt-4">7. Termination</h2>
            <p>
                MookTest reserves the right to suspend or terminate any account or subdomain found in violation of these terms, with or without prior notice.
            </p>

            <h2 class="mt-4">8. Changes to Terms</h2>
            <p>
                We may update these Terms & Conditions from time to time. Continued use of the platform after changes are published constitutes acceptance of the revised terms.
            </p>

            <h2 class="mt-4">9. Contact Us</h2>
            <p>
                If you have any questions or concerns about these terms, please contact us at <strong>support@mooktest.com</strong>.
            </p>

            <p class="mt-4"><em>Last updated: July 28, 2025</em></p>
        </div>
        </div>

    </section>
</main>
@endsection