@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 px-4">

    <div class="w-full max-w-md bg-white dark:bg-gray-800 p-6 rounded-lg shadow">

        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800 dark:text-white">
            Iniciar sesión
        </h2>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <input type="email" name="email" placeholder="Email"
                    class="w-full border rounded p-2 focus:outline-none focus:ring"
                    required>
            </div>

            <div>
                <input type="password" name="password" placeholder="Password"
                    class="w-full border rounded p-2 focus:outline-none focus:ring"
                    required>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded">
                Login
            </button>
        </form>

        <!-- Divider -->
        <div class="my-6 flex items-center">
            <div class="flex-1 h-px bg-gray-300"></div>
            <span class="px-3 text-gray-500 text-sm">o continuar con</span>
            <div class="flex-1 h-px bg-gray-300"></div>
        </div>

        <!-- Social Login Buttons -->
        <div class="space-y-3">

            <!-- Google -->
            <a href="{{ url('/login/google') }}"
               class="flex items-center justify-center gap-2 w-full border py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                <span>Google</span>
            </a>

            <!-- GitHub -->
            <a href="{{ url('/login/github') }}"
               class="flex items-center justify-center gap-2 w-full border py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                GitHub
            </a>

        </div>

    </div>
</div>
@endsection