@extends('layouts.layout')
@section('page_title', 'Total students')
@section('content')

<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Total Students of {{ $classes->name }}</h1>
                <div class="w-full mt-6">
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Student Name</th>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Student Email</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse ($students as $student)
                                    <tr>
                                        <td class="w-1/3 text-left py-3 px-4">{{ $student->name }}</td>
                                        <td class="w-1/3 text-left py-3 px-4">{{ $student->email }}</td>
                                        <td class="w-1/3 text-left py-3 px-4">Edit | Delete</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="w-1/3 text-center py-3 px-4" colspan="3">("No Students found")</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

@endsection
