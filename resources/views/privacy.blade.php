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
    <!-- About Us Section -->
    <section id="privacy-policy" class="container pt-5">
        <div class="row py-5">
            <div class="col-12">
                <h1>Privacy Policy – MookTest</h1>

                <p>
                    At <strong>MookTest</strong>, we are committed to protecting your privacy. This Privacy Policy outlines how we collect, use, store, and protect your personal information when you visit or use any part of our platform.
                </p>

                <h2 class="mt-5">1. Information We Collect</h2>
                <ul class="list-unstyled ms-3">
                    <li>👤 <strong>Personal Info:</strong> Name, email, phone, organization name (collected when you sign up or fill out the “Get Started” form)</li>
                    <li>📊 <strong>Usage Data:</strong> Pages visited, time spent, actions performed (collected via analytics tools)</li>
                    <li>💳 <strong>Payment Data:</strong> If you enable paid quizzes, we may process payment-related information through secure third-party gateways</li>
                </ul>

                <h2 class="mt-5">2. How We Use Your Data</h2>
                <ul class="list-unstyled ms-3">
                    <li>✅ To create and manage your MookTest subdomain and dashboard</li>
                    <li>✅ To communicate with you regarding your account or updates</li>
                    <li>✅ To monitor and improve platform performance and user experience</li>
                    <li>✅ To support transactions and analytics for educators and students</li>
                </ul>

                <h2 class="mt-5">3. Data Sharing & Disclosure</h2>
                <p class="ms-3">
                    We do <strong>not sell or rent</strong> your personal information. We may share it with trusted third-party services only to:
                </p>
                <ul class="list-unstyled ms-3">
                    <li>✔️ Process payments securely</li>
                    <li>✔️ Send transactional or notification emails</li>
                    <li>✔️ Analyze usage trends and platform performance</li>
                </ul>

                <h2 class="mt-5">4. Data Storageh2 Security</h2>
                <p class="ms-3">
                    All user data is stored securely using industry-standard encryption and security measures. We regularly update our infrastructure to maintain a safe and compliant environment.
                </p>

                <h2 class="mt-5">5. Cookies</h2>
                <p class="ms-3">
                    MookTest uses cookies to improve user experience and track website activity. You can disable cookies via your browser settings, but some features may not function correctly.
                </p>

                <h2 class="mt-5">6. Your Rights</h2>
                <p class="ms-3">You have the right to:</p>
                <ul class="list-unstyled ms-3">
                    <li>🔍 Access and review your stored information</li>
                    <li>✏️ Request updates or corrections to your data</li>
                    <li>🗑️ Request deletion of your account and data (subject to legal and operational requirements)</li>
                </ul>

                <h2 class="mt-5">7. Third-h2rty Links</h2>
                <p class="ms-3">
                    Our platform may include links to third-party websites. We are not responsible for the privacy practices of these external sites. Please review their privacy policies before sharing information.
                </p>

                <h2 class="mt-5">8. Children’s Privacy</h2>
                <p class="ms-3">
                    MookTest is not intended for children under 13. We do not knowingly collect personal information from anyone under this age.
                </p>

                <h2 class="mt-5">9. Changes to h2is Policy</h2>
                <p class="ms-3">
                    We may update this Privacy Policy from time to time. Any changes will be posted on this page with the “Last updated” date below.
                    p </p>

                <h2 class="mt-5">10. Contact Us</h2>
                <p class="ms-3">
                    For any privacy-related questions or requests, please contact us at <strong>privacy@mooktest.com</strong>.
                </p>

                <p class="mt-4"><em>Last updated: July 28, 2025</em></p>
            </div>
        </div>
    </section>
</main>
@endsection