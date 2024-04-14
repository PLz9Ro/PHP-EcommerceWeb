@component('mail::message')

Hi {{ $user->name }},

<p>You're almost ready to start enjoying the benefits of E-Commerce.</p>

<p>Simply click the button below to verify your email address.</p>

@component('mail::button', ['url' => url('activate/' . base64_encode($user->id))])
Verify
@endcomponent

<p>This will verify your email address, and then you'll officially be a part of the E-Commerce.</p>

@endcomponent