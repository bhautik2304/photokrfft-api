<x-mail::message>
# New registration email

Hi there, {{ $userName }}!

You are officially part of the photokrafft family!

We want to personally thank you for joining us and share some helpful advice on getting started.

<x-mail::button :url="''">
Go to Photokrafft.com
</x-mail::button>

Thank you for joining photokrafft.com. We can’t wait to show you what we have for you !!

Thanks & Regards ,<br/>
{{ config('app.name') }}
</x-mail::message>
