<x-mail::message>
# OTP for Reset Password
Dear {{$order->costomer->name}}

Order Details:
Order Number: {{$order->order_no}}

Delivery Partner Information:
We've partnered with the best delivery partner for your product. To track your order in real-time, please click on the link:
{{$order->delivery_partner_link}}
    
@component('mail::panel')
Delivery Tracking Number: {{$order->delivery_tracking_no}}
@endcomponent

By clicking on the link provided above and entering your tracking number, you'll be able to monitor the progress of your delivery every step of the way.
Should you have any questions or concerns regarding your delivery, feel free to reach out to our customer support team at support@photokrafft.com or Customer Support <b>+91 9227232123</b>. We're here to assist you in any way we can.
Thank you for choosing Photokrafft.com ! We truly appreciate your business and hope you enjoy your purchase.

Warm regards,
<br>
{{ config('app.name') }}
</x-mail::message>
