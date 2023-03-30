<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/assets/css/fomantic/dist/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="http://127.0.0.1:8000/assets/css/fomantic/dist/semantic.js"></script>
</head>

<body>
    <div class="ui middle aligned center aligned grid">
        <img src="assets/img/logoNew.png" class="image">
    </div>
    <div class="ui text container itens">
        <div class="ui segments">
            <div class="ui segment item">Content</div>
            <div class="ui segment item">Content</div>
            <div class="ui segment item">Content</div>
            <div class="ui segment item">Content</div>
        </div>
    </div>
</body>

</html>

<style type="text/css">
    body {
        /* https: //www.joshwcomeau.com/gradient-generator/ */
        background-image: linear-gradient(40deg,
                hsl(12deg 7% 28%) 0%,
                hsl(11deg 27% 37%) 19%,
                hsl(10deg 40% 46%) 32%,
                hsl(9deg 58% 55%) 46%,
                hsl(7deg 53% 52%) 59%,
                hsl(5deg 48% 37%) 72%,
                hsl(3deg 45% 22%) 85%,
                hsl(7deg 57% 8%) 100%);
    }

    .itens {
        margin-top: 50px;
        /* background-color: white; */
    }

    .item {
        margin: 5px !important;
    }

    .image {
        margin-top: 100px;
        width: 150px;
        width: 150px;
    }
</style>







<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />

                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />

                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Address')" />

                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />

                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>