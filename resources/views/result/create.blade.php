@extends('layouts.layout')
@section('page_title', 'Result Form')
@section('content')
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div class="flex flex-wrap">
                    <div class="w-full my-6 pr-0 lg:pr-2">
                        <p class="text-xl pb-6 flex items-center">
                            <i class="fas fa-list mr-3"></i> Result Form
                        </p>
                        <div class="content-center leading-loose">
                            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('results.store') }}" method="post">
                                @csrf
                                @include('result._form', ['buttonText' => __('Create')])
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
@endsection
