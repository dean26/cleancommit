@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full">
            <section class="break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg pb-4">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Company') }}
                </header>
                <div class="w-full p-6">

                {{  __("Company attributes....") }}
            </section>
        </div>
    </main>
@endsection
