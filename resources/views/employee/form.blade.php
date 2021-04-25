@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full">
            <section class="break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg pb-4">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Employee') }} {{ $object->id ? __('new') : __('edit') }}
                </header>
                <div class="w-full p-6">

                    @include('form_errors')

                    <form
                        action="{{ $object->id ? route('employee.update', ['employee' => $object]) : route('employee.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="{{  ($object->id) ? 'PUT' : 'POST' }}">

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                                {{ __('First name') }}
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required id="first_name" name="first_name" type="text" value="{{ App\Helpers\OldForm::getVal('first_name', $object) }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                                {{ __('Last name') }}
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="last_name" name="last_name" type="text" value="{{ App\Helpers\OldForm::getVal('last_name', $object) }}">
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
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                                {{ __('Phone') }}
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="phone" name="phone" type="text" value="{{ App\Helpers\OldForm::getVal('phone', $object) }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="company_id">
                                {{ __('Company') }}
                            </label>
                            <select name="company_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach (App\Models\Company::formList() as $key => $value)
                                    <option value="{{  $key }}"
                                       {{ $key == App\Helpers\OldForm::getVal('company_id', $object) ? 'selected' : '' }}>{{  $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    {{ __('Submit form') }}
                                </button>
                                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('employee.index') }}">
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
