@php
    use Illuminate\Support\Facades\Storage;
    $customer = $record->customer;
    $profile = $customer?->profile;
    $imageUrl = $profile && $profile->profile_picture
        ? Storage::disk('public')->url($profile->profile_picture)
        : asset('images/avatar.png'); // fallback
@endphp

<div class="filament-modal-content p-4">
    <div class="flex items-center gap-4 mb-4">
        <img src="{{ $imageUrl }}" alt="profile" class="h-20 w-20 rounded-full object-cover" />
        <div>
            <div class="text-lg font-medium">{{ $customer?->username ?? '—' }}</div>
            <div class="text-sm text-muted-foreground">{{ $customer?->email ?? '—' }}</div>
        </div>
    </div>

    <div class="mb-3">
        <h3 class="text-sm font-semibold mb-1">Rating</h3>
        <div class="text-xl font-bold">
            {{ $record->rating ?? '—' }} / 5
        </div>
    </div>

    <div class="mb-3">
        <h3 class="text-sm font-semibold mb-1">Comment</h3>
        <div class="whitespace-pre-line text-sm">{{ $record->comment ?? '—' }}</div>
    </div>

    <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 mt-4">
        <div>
            <span class="font-medium">Car:</span>
            <div>{{ $record->car?->brand ?? '—' }} {{ $record->car?->name ? ' / '.$record->car->name : '' }}</div>
        </div>
        <div>
            <span class="font-medium">Submitted:</span>
            <div>{{ optional($record->created_at)->toDayDateTimeString() ?? '—' }}</div>
        </div>
    </div>
</div>
