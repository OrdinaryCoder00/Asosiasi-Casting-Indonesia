@if($record->video)
<video controls style="max-width:100%; border-radius:5px;">
    <source src="{{ route('casting.video.stream', ['filename' => $record->fullname . '/videos/' . basename($record->video)]) }}" type="video/mp4">
</video>

@else
    <span>No video uploaded</span>
@endif
