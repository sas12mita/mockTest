<p>Hello {{ $name }},</p>

<p>Your account for Project Sayogi has been created. Here are your login details:</p>

<ul>
    <li><strong>Username:</strong> {{ $username }}</li>
    <li><strong>Password:</strong> {{ $password }}</li>
</ul>

<p>Login here: <a
        href="https://www.{{ $slug }}.app.projectsayogi.com/login">https://www.{{ $slug }}.app.projectsayogi.com/login</a>
</p>

<p>Regards,<br>Project Sayogi Team</p>
