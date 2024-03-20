<x-mail::message>
# OTP for Reset Password

@component('mail::panel')
{{ $otp }}
@endcomponent

This OTP is valid for reset password only , If you did not initiate this action, please disregard this email.

<br>
{{ config('app.name') }}
</x-mail::message>
