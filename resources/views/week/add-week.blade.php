<x-app-layout>

<body class="bg-gray-100">
    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Create New Week</h2>
                <form action="{{route('store-week')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="week_name" class="block text-gray-700 text-sm font-semibold mb-2">Week Name</label>
                        <input type="text" id="week_name" name="week_name" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @error('week_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="from_date" class="block text-gray-700 text-sm font-semibold mb-2">From Date</label>
                        <input type="date" id="from_date" name="from_date" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @error('from_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="to_date" class="block text-gray-700 text-sm font-semibold mb-2">To Date</label>
                        <input type="date" id="to_date" name="to_date" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @error('to_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                            Create Week
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</x-app-layout>
