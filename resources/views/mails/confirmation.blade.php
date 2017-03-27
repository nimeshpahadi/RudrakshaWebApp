Hi {{ $firstname }},
<p>Your registration is completed. Please click the link to get access.</p>

<a href="{{ route('confirmation', $token) }}">Click Here to Verify Email</a>