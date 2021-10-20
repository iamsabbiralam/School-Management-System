@extends('layouts.layout')
@section('page_title', 'Import Sheet')
@section('content')
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div class="flex flex-wrap">
                    <div class="w-full my-6 pr-0 lg:pr-2">
                        <p class="text-xl pb-6 flex items-center">
                            <i class="fas fa-list mr-3"></i> Import Sheet
                        </p>
                        <div class="content-center leading-loose">
                            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('markimports.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Upload file</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="file" name="file" type="file">
                                </div>
                                <div class="mt-6">
                                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Import</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
@endsection
