@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full">
            <section class="break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg pb-4">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Companies') }}
                </header>
                <div class="w-full p-6">
                    @include('info')
                    <p class="mb-6">
                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            href="{{ route('company.create') }}">{{ __('Add new company') }}</a>
                    </p>

                    @if ($companies->total() > 0)

                        <table class="min-w-full divide-y divide-gray-200 mb-6">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Name') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Email') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Logo') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Website') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($companies as $company)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{  $company->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{  $company->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($company->logo)
                                                <img src="{{ asset($company->getFullPublicPath()) }}" alt="" class="object-contain"/>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{  $company->website }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{!! route('company.edit', ['company' => $company]) !!}" 
                                                class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">{{ __('Edit') }}</a>

                                            <a href="{!! route('company.destroy', ['company' => $company]) !!}" class="inline-block align-baseline font-bold text-sm text-red-500 hover:text-red-800"
                                                data-method="delete">{{ __('Delete') }}</a>   
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $companies->links() !!}
                    @else
                        {{ __('Empty') }}
                    @endif
                </div>

            </section>
        </div>
    </main>
@endsection
