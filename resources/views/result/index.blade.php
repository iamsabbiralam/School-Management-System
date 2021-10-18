@extends('layouts.layout')
@section('page_title', 'Student List')
@section('content')

<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Student List</h1>
                <div class="w-full mt-6">
                    <a href="{{ route('results.create') }}">
                        <button class="text-xl pb-3 flex items-center px-4 py-2 my-2 text-white bg-green-600">
                        <i class="fas fa-list mr-3"></i> Result Form
                    </button>
                    </a>
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Student ID</th>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Student's Class</th>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Student Name</th>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Total Marks</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse ($results as $result)
                                    <tr>
                                        <td class="w-1/3 text-left py-3 px-4">{{ $result->student_id }}</td>
                                        <td class="w-1/3 text-left py-3 px-4">{{ $result->students->classnames->name }}</td>
                                        <td class="w-1/3 text-left py-3 px-4">{{ $result->students->name }}</td>
                                        <td class="w-1/3 text-left py-3 px-4">{{ $result->sum }}</td>
                                        <td class="w-1/3 text-left py-3 px-4">
                                            <a href="{{ route('students.show',$result->student_id) }}">
                                                <button class="text-xl pb-3 flex items-center px-4 py-2 my-2 text-white bg-green-600">Details</button>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="w-1/3 text-center py-3 px-4" colspan="3">("No list found")</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>

@endsection
