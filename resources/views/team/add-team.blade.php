<x-app-layout>

<body class="bg-gray-100">
    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Create New Team</h2>
                <form action="{{route('store-team')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="team_name" class="block text-gray-700 text-sm font-semibold mb-2">Team Name</label>
                        <input type="text" id="team_name" name="team_name" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @error('team_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                            Create Team
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</x-app-layout>
