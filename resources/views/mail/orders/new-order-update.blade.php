<x-mail::message>
# Hello , <span style="text-transform: capitalize;" >{{ $order->costomer->name }}</span> <br/>

Woo hoo!! <br/>
<x-mail::panel class="alert-success" >
Your order status has changed to <span style="text-transform: capitalize;" >{{ $order->order_status }}</span> <br/>
</x-mail::panel>
@php
    $timestamp = strtotime($order->created_at);
@endphp

<x-mail::panel >

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

You will get production level updates about this order ones we start processing it.<br>

Ones the order is ready to dispatch we will deliver the order to the below mentioned details.<br>

SHIPPING ADDRESS : <br>
{{ $order->delivery_address ? $order->delivery_address : $order->costomer->address }}<br>

Thanks & Regards,<br>
{{ config('app.name') }}
</x-mail::message>
