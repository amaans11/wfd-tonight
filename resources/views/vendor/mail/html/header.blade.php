<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo"  alt="Laravel Logo">
@else
<img src="{{ asset('images/wfdt-email-logo.png') }}" class="logo" style="width:100px;height:50px;" alt="WFDT">
@endif
</a>
</td>
</tr>
