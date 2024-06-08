<x-mail::message>
# New registration email

Hi {{ $userName }}.

Welcome to Photokrafft! We're excited to have you join our vibrant community of professional photographers.

<center><b>Your account has been successfully confirmed</b></center>

You can now log in and start exploring all the products and services Photokrafft offers. Here are a few things you
can do to get started:

Explore Products: <a href="https://photokrafft.com/products">Our Products</a>
Explore Services: <a href="https://photokrafft.com/Services">Our Services</a>
Start an Order: <a href="https://photokrafft.com/Start-Printing">Order Now</a>
If you have any questions or need assistance, feel free to reach out to our support team at info@photokrafft.com or
visit our Support Page.

Thank you for joining us. We can't wait to see your amazing photos and help you with your printing needs.

<x-mail::button :url="'https://photokrafft.com/'">
    Go to Photokrafft.com
</x-mail::button>

Thanks & Regards ,<br />
{{ config('app.name') }}
</x-mail::message>
