@component('mail::message')
    Hello Admin,
    You received an email from :

    Name: {{ $name }}
    Phone: {{ $phone }}
    Email: {{ $email }}

    Here are the details:
    -----------------------------

    Subject: {{ $subject }}
    Text: {{ $text }}
@endcomponent

