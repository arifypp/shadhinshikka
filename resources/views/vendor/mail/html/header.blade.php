<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Shahdin-Shikkha')
<img src="https://lh4.googleusercontent.com/W8EhKAo-bMZVEN-4ZD9tE2Eah2f-RYm3tDNCddPfo6nOWOjGEwZyEJUG1DZbA054jBeNNuehqk1En5RYqeGe=w1280-h891" class="logo" alt="{{ config('settings.title') }}" width="210" style="width:210px !important;">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
