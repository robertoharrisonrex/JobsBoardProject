<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>
    <h1 class="text-lg mb-4 font-bold">Account Details</h1>

    <form method="POST" action="/login">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" :value="old('email')" id="email"/>
                            <div>
                                <x-form-error name="email"/>
                            </div>
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" type="password" id="password"/>
                            <x-form-error name="password"/>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-center gap-x-6">
            <x-form-button>
                Login
            </x-form-button>
        </div>
    </form>


</x-layout>
