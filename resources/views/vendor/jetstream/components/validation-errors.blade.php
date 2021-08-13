@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-yellow-300">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 text-sm text-white list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
