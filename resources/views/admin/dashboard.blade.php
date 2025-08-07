<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{ Auth::guard('admin')->user()->name }} - ({{ Auth::guard('admin')->user()->email }})
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Merchant Dashboard</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full border text-center text-sm">
                        <thead class="bg-gray-100 text-gray-700 uppercase">
                            <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">Address</th>
                                <th class="border px-4 py-2">PW Protected</th>
                                <th class="border px-4 py-2">Active Square</th>
                                <th class="border px-4 py-2">Apple Pay</th>
                                <th class="border px-4 py-2">Apple Login</th>
                                <th class="border px-4 py-2">Google Login (iOS)</th>
                                <th class="border px-4 py-2">Google Login (Android)</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($merchants as $merchant)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-4 py-2">{{ $merchant['id'] }}</td>
                                    <td class="border px-4 py-2">{{ $merchant['name'] }}</td>
                                    <td class="border px-4 py-2">
                                        <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-200 text-green-800 rounded">
                                            {{ $merchant['status'] }}
                                        </span>
                                    </td>
                                    <td class="border px-4 py-2">{{ $merchant['address'] }}</td>
                                    <td class="border px-4 py-2">{{ $merchant['pw_protected'] }}</td>
                                    <td class="border px-4 py-2">{{ $merchant['active_square'] }}</td>
                                    <td class="border px-4 py-2">{{ $merchant['apple_pay'] }}</td>
                                    <td class="border px-4 py-2">{{ $merchant['apple_login'] }}</td>
                                    <td class="border px-4 py-2">{{ $merchant['google_ios'] }}</td>
                                    <td class="border px-4 py-2">{{ $merchant['google_android'] }}</td>
                                    <td class="border px-4 py-2 space-y-1">
                                        <a href="#" class="block bg-blue-500 text-white text-xs px-2 py-1 rounded hover:bg-blue-600">Locations</a>
                                        <a href="#" class="block bg-gray-500 text-white text-xs px-2 py-1 rounded hover:bg-gray-600">Attendance</a>
                                        <a href="#" class="block bg-cyan-500 text-white text-xs px-2 py-1 rounded hover:bg-cyan-600">App Config</a>
                                        <a href="#" class="block bg-yellow-500 text-white text-xs px-2 py-1 rounded hover:bg-yellow-600">Panel Settings</a>
                                        <a href="#" class="block bg-green-500 text-white text-xs px-2 py-1 rounded hover:bg-green-600">User Times</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
