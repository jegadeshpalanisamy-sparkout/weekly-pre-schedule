<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    <!-- @if ($message)
    <div class="mb-4">
        <div class="bg-{{ $type === 'success' ? 'green' : 'red' }}-100 border border-{{ $type === 'success' ? 'green' : 'red' }}-400 text-{{ $type === 'success' ? 'green' : 'red' }}-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ $type === 'success' ? 'Success!' : 'Error!' }}</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    </div>
    @endif -->

    @if ($message)
    <div class="mb-4">
        @php
            $bgColor = $type === 'success' ? 'bg-green-100' : 'bg-red-100';
            $borderColor = $type === 'success' ? 'border-green-400' : 'border-red-400';
            $textColor = $type === 'success' ? 'text-green-700' : 'text-red-700';
            $alertType = $type === 'success' ? 'Success!' : 'Error!';
        @endphp
        <div class="{{ $bgColor }} {{ $borderColor }} {{ $textColor }} px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ $alertType }}</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    </div>
    @endif
</div>