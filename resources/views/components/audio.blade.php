@php
    $_data = $attributes['data'];
@endphp
<div>
    <audio  id="audio-{{$_data->id}}" id="song" src="/storage/nhac/{{ $_data->filenhac }}" type="audio/mpeg"></audio>
</div>
