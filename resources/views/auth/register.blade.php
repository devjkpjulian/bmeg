<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" placeholder="{{ __('Name') }}" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" placeholder="{{ __('Email') }}" required />
            </div>

            <div class="mt-4">
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2 text-white">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-white underline hover:text-yellow-300">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-white underline hover:text-yellow-300">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex flex-row items-center justify-end mt-4 space-x-2">
                <a href="{{ route('login')}}"class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-900 border border-transparent rounded-md hover:bg-white hover:text-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                    {{ __('Login') }}
                </a>

                <x-jet-button>
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
