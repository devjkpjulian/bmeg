<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-yellow-300 border border-transparent rounded-md font-semibold text-xs text-gray-900 hover:text-white uppercase tracking-widest hover:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:border-yellow-900 focus:ring focus:ring-yellow-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
