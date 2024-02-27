<x-mail::message>
# Hello , <span style="text-transform: capitalize;" >{{ $order->costomer->name }}</span> <br/>

Woo hoo!! <br/>

Your order has been successfully placed <br/>

<x-mail::panel>
<h4>ORDER SUMMARY:</h4>

@php
    $timestamp = strtotime($order->created_at);
@endphp


@component('mail::table')
|                   |               |                                  |
| ------------------|:-------------:| --------------------------------:|
| Order :           |               | {{ $order->order_no }}           |
| Order Date :      |               | {{ date("F j, Y", $timestamp) }} |
| Subtotal :        |               | {{ $order->order_total }}        |
@endcomponent
</x-mail::panel>


<x-mail::button :url="'https://sascube.ltd/profile/orders'">
Check Your Order Status
</x-mail::button>

You will get production level updates about this order ones we start processing it.

Ones the order is ready to dispatch we will deliver the order to the below mentioned details.

SHIPPING ADDRESS : <br>
{{ $order->delivery_address ? $order->delivery_address : $order->costomer->address }}

Thanks & Regards,<br>
{{ config('app.name') }}
</x-mail::message>
