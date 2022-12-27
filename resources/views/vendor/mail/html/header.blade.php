<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://static.wixstatic.com/media/23a8d1_90e98901f7224e04b142ea387775ed0d~mv2.png/v1/fill/w_339,h_168,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Logotipo-HVACOPCOST_blanco.png" class="logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
