{{-- resources/views/merchant-login.blade.php --}}
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Merchant Sign In — {{ config('app.name') }}</title>

  {{-- Vite (app.css has Tailwind) --}}
  @vite(['resources/js/app.js', 'resources/css/app.css'])
  {{-- optional extra CSS if you created merchant-login.css --}}
  @if (file_exists(resource_path('css/merchant-login.css')))
    <link rel="stylesheet" href="{{ asset('build/merchant-login.css') }}">
  @endif

  <style>
    /* small inline fallback in case you don't add merchant-login.css */
    .left-gradient {
      background: linear-gradient(180deg, rgba(255,255,255,0.06) 0%, rgba(0,0,0,0.7) 100%);
    }
  </style>
</head>
<body class="min-h-screen antialiased bg-gray-50 dark:bg-gray-900">
  <div class="min-h-screen grid grid-cols-1 md:grid-cols-2">
    <!-- Left column: logo + pattern -->
    <div class="hidden md:flex items-center justify-center left-gradient relative overflow-hidden">
      <div class="max-w-lg w-full px-10 py-16">
        {{-- Big logo --}}
        <img src="{{ asset('images/logo/pickbrew-full.png') }}" alt="PickBrew" class="w-64 mb-8" />
        {{-- tagline --}}
        <p class="text-gray-300 dark:text-gray-400 text-sm">ORDER AHEAD MOBILE APPS</p>

        {{-- subtle grid overlay at bottom-left similar to screenshot --}}
        <div class="absolute left-6 bottom-6 grid grid-cols-6 gap-1 opacity-20">
          @for ($i = 0; $i < 18; $i++)
            <div class="w-6 h-6 bg-gray-700 dark:bg-gray-800"></div>
          @endfor
        </div>
      </div>
    </div>

    <!-- Right column: login form -->
    <div class="flex items-center justify-center">
      <div class="w-full max-w-md px-8 py-12">
        <h1 class="text-3xl font-extrabold text-gray-800 dark:text-white mb-2">Sign In</h1>
        <p class="text-sm text-gray-500 dark:text-gray-300 mb-8">
          Enter your email and password to sign in!
        </p>

        <form method="POST" action="{{ route('merchant.login.submit') }}" class="space-y-5">
          @csrf

          <div>
            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-2">Email</label>
            <div class="relative">
              <input name="email" type="email" required
                     value="{{ old('email') }}"
                     class="w-full rounded-md border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200" />
              <!-- optional small icon -->
              <div class="absolute right-3 top-3 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M16 12H8m8 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
              </div>
            </div>
            @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-2">Password</label>
            <div class="relative">
              <input name="password" id="password" type="password" required
                     class="w-full rounded-md border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200" />
              <button type="button" id="togglePwd" class="absolute right-2 top-2.5 text-gray-500">
                <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 012.223-3.652M3 3l18 18"/></svg>
              </button>
            </div>
            @error('password') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
          </div>

          <div class="flex items-center justify-between">
            <label class="inline-flex items-center gap-2 text-sm">
              <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
              <span class="text-gray-600 dark:text-gray-300">Remember me</span>
            </label>
            <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">Forgot password?</a>
          </div>

          <div>
            <button type="submit" class="w-full inline-flex justify-center items-center gap-2 px-4 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md shadow">
              Sign In
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform rotate-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
              </svg>
            </button>
          </div>
        </form>

        {{-- Demo credentials box (optional) --}}
        @if (config('app.demo_mode', false))
          <div class="mt-6 p-3 border border-gray-200 rounded-md bg-white/60 dark:bg-gray-800/60">
            <strong>Demo:</strong> merchant@example.com / password
          </div>
        @endif
      </div>
    </div>
  </div>

  <script>
    // password toggle
    document.addEventListener('DOMContentLoaded', function () {
      const toggle = document.getElementById('togglePwd');
      if (!toggle) return;
      const pwd = document.getElementById('password');
      const eyeOpen = document.getElementById('eyeOpen');
      const eyeClosed = document.getElementById('eyeClosed');

      toggle.addEventListener('click', function () {
        if (pwd.type === 'password') {
          pwd.type = 'text';
          eyeOpen.classList.add('hidden');
          eyeClosed.classList.remove('hidden');
        } else {
          pwd.type = 'password';
          eyeOpen.classList.remove('hidden');
          eyeClosed.classList.add('hidden');
        }
      });
    });
  </script>
</body>
</html>
