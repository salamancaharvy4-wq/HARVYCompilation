<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- User Profile Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Logged-in User Profile</h3>
                    <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Full Name:</strong> {{ auth()->user()->full_name }}</p>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    <p><strong>Role:</strong> {{ auth()->user()->role }}</p>
                </div>
            </div>

            <!-- External API Section (Posts) -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">External API: Latest Posts</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach(array_slice($posts, 0, 6) as $post)
                        <div class="border rounded-lg p-4 shadow-sm">
                            <h4 class="font-bold text-md mb-2">{{ $post['title'] }}</h4>
                            <p class="text-gray-600 text-sm">{{ Str::limit($post['body'], 100) }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
