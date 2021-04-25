@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full">
            <section class="break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg pb-4">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Company') }} {{ $object->id ? __('new') : __('edit') }}
                </header>
                <div class="w-full p-6">

                    @include('form_errors')

                    <form
                        action="{{ $object->id ? route('company.update', ['company' => $object]) : route('company.store') }}"
                        enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="{{  ($object->id) ? 'PUT' : 'POST' }}">

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                {{ __('Name') }}
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required id="name" name="name" type="text" value="{{ App\Helpers\OldForm::getVal('name', $object) }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                {{ __('Email') }}
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="email" name="email" type="email" value="{{ App\Helpers\OldForm::getVal('email', $object) }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="logo">
                                {{ __('Logo') }}
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="logo" name="logo" type="file">
                            @if($object->logo)
                                <p class="p-4">
                                    <img src="{{ asset($object->getFullPublicPath()) }}" alt="" class="object-contain"/>
                                </p>
                            @endif     
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="website">
                                {{ __('Website') }}
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="website" name="website" type="text" value="{{ App\Helpers\OldForm::getVal('website', $object) }}">
                        </div>
                        <div class="mb-4">
                            <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    {{ __('Submit form') }}
                                </button>
                                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('company.index') }}">
                                    {{ __('Cancel') }}
                                </a>
                              </div>
                        </div>
                    </form>

                </div>

            </section>
        </div>
    </main>
@endsection
