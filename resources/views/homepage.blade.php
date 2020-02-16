@extends('layout.app')

@section('title', 'Currency Rates - RSS')

@section('content')
    <div class="max-w-xl px-5 mx-auto my-6">
        <div class="flex flex-col">
            <div class="leading-snug md:leading-normal">
                <span class="text-gray-500 text-sm md:text-base">{{ date('d/m/Y - H:i') }}</span>
                <div class="text-xl md:text-2xl lg:text-4xl">Exchange rates ({{ $rates['date'] }})</div>
            </div>

            <form class="flex relative mt-2">
                <input class="flex-grow bg-transparent appearance-none border-blue-800 focus:outline-none border-b-2 border-blue-700 py-2 pr-10 focus:border-blue-600" type="text" name="search" value="{{request()->search}}" maxlength="3" placeholder="Enter name of currency">

                <button class="absolute inset-y-0 px-4 -mr-4 right-0 focus:outline-none hover:text-orange-400">
                    <svg class="fill-current w-5 h-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M12.906 14.32a8 8 0 111.414-1.414l5.337 5.337-1.414 1.414-5.337-5.337zM8 14A6 6 0 108 2a6 6 0 000 12z" fill-rule="evenodd"/></svg>
                </button>
            </form>
        </div>

        {{ $rates['rates']->links('pagination') }}

        <table class="table-auto w-full border-l border-r border-blue-800 mt-4">
            <thead>
                <tr class="bg-blue-800">
                    <th class="px-4 py-2">Currency</th>
                    <th class="px-4 py-2 border-l border-blue-700 text-right">Currency unit for 1 euro</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rates['rates'] as $rate)
                    <tr class="border-blue-800 border-b">
                        <td class="px-4 py-2 text-center">{{ $rate->currency->name }}</td>
                        <td class="px-4 py-2 border-l border-blue-800 text-right">{{ number_format($rate->rate, 5) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $rates['rates']->links('pagination') }}

    </div>
@endsection
