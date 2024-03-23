<x-mail::message>
# Introduction
Hi ,

We're happy because you created an account on photokrafft.com. To star your account verification and ordering process on photokrafft.com, please confirm your email address.


<x-mail::button :url="$link">
Verify Now
</x-mail::button>

Or copy-paste this link : <a class="btn " href='{{$link}}'>{{$link}}</a><br/>

Welcome to photokrafft.com !!<br/>
Note : Your account will get activated after an internal verification
</x-mail::message>