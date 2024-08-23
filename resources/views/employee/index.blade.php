<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Display success message -->
              

                <div class="p-6 text-gray-900 flex justify-end">
                    <!-- Add employee Button -->
                    <a href="{{ route('add-employee') }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600">
                        Add Employee
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                    <x-display-creation-status type="success" :message="session('success')" />
                @endif
                <!-- Display error message -->
                @if (session('error'))
                    <x-display-creation-status type="error" :message="session('error')" />
                @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-left">
                            <th class="px-4 py-2">Employee Name</th>
                            <th class="px-4 py-2">Team</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr class="border-b border-gray-200">
                                <td class="px-4 py-2">{{ $employee->emp_name }}</td>
                                <td class="px-4 py-2">{{ $employee->team->team_name }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('employee.edit', $employee->id) }}" class="nline-block px-4 py-2 bg-yellow-500 text-white font-semibold rounded-lg shadow-md hover:bg-yellow-600">Edit</a>
                                    <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="nline-block px-4 py-2 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
