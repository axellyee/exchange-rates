@extends('layout.app')

@section('title', 'Currency Rate - ')

@section('content')
    <div class="max-w-xl px-5 mx-auto my-6">
        <div class="flex flex-col">
            <div class="leading-snug md:leading-normal">
                <span class="text-gray-500 text-sm md:text-base">{{ date('d/m/Y - H:i') }}</span>
                <div class="text-xl md:text-2xl lg:text-4xl">Exchange rate - ({{ $rates->first()->currency->name }})</div>
                <a class="hover:text-orange-400" href="{{ route('home') }}">Back to all exchange rates</a>
            </div>
        </div>

        {{ $rates->links('pagination') }}

        <table class="table-auto w-full border-l border-r border-blue-800 mt-4">
            <thead>
            <tr class="bg-blue-800">
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2 border-l border-blue-700 text-right">Currency unit for 1 euro</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rates as $rate)
                <tr class="border-blue-800 border-b">
                    <td class="px-4 py-2 text-center">{{ $rate->date }}</td>
                    <td class="px-4 py-2 border-l border-blue-800 text-right">{{ number_format($rate->rate, 5) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $rates->links('pagination') }}

    </div>
@endsection
