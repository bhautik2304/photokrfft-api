<x-mail::message>
# Hello , <span style="text-transform: capitalize;" >{{ $order->costomer->name }}</span> <br/>

Thank you for your order! We are excited to let you know that we have received your order <strong>#ORD-{{ $order->order_no }}</strong>. Here are the details of your purchase: <br/>

<x-mail::panel>
<h4>ORDER SUMMARY:</h4>

@php
    $timestamp = strtotime($order->created_at);
@endphp

Your order is being processed, and you will receive another email once your items have shipped. You can track your order status and view your order history by logging into your account on our website.  

@component('mail::table')
|                   |               |                                                                        |
| ------------------|:-------------:| ----------------------------------------------------------------------:|
| Order :           |               | ORD-{{ $order->order_no }}                                             |
| Order Date :      |               | {{ date("F j, Y", $timestamp) }}                                       |
| Total :           |               | {{$order->countryzone->currency_sign}} {{ $order->order_total }}       |
@endcomponent
</x-mail::panel>


<x-mail::button :url="'https://photokrafft.com/Profiles/orders'">
Check Your Order Status
</x-mail::button>


SHIPPING ADDRESS : <br>
{{ $order->delivery_address !== null ? $order->delivery_address : $order->costomer->address }}
<br/>
If you have any questions or need assistance, please do not hesitate to contact our support team at support@photokrafft.com or visit our Support Page.<br>

Thank you for shopping with us!<br>
Thanks & Regards,<br>
The Photokrafft Team  
{{ config('app.name') }}
</x-mail::message>
