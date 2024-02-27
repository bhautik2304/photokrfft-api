<x-mail::message>
# OTP for Reset Password

@component('mail::panel')
{{ $otp }}
@endcomponent

This OTP is valid for a short period, so please use it as soon as possible. If you did not initiate this action, please disregard this email.

<br>
{{ config('app.name') }}
</x-mail::message>
