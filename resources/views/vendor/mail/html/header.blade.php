@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            <img src="https://basira.in/public/logo.png" width="250" alt="Photokrafft.com">
            @if (trim($slot) === 'Photokrafft.com')
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
