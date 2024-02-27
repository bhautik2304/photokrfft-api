@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Photokrafft.com')
<img src="https://basira.in/assets/logo.png" width="250" alt="Photokrafft.com">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
