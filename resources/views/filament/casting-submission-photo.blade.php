@if($record->photo)
    <img src="{{ asset('storage/' . $record->photo) }}" style="max-width:100%; border-radius:5px;" />
@else
    <span>No photo uploaded</span>
@endif