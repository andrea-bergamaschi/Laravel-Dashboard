@extends('dashboard')

@section('content')

<div class="container justify-center mx-auto text-center">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="border-b border-gray-200 shadow">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xl text-gray-500">
                                City
                            </th>
                            <th class="px-6 py-2 text-xl text-gray-500">
                                Gym
                            </th>
                            <th class="px-6 py-2 text-xl text-gray-500">
                                Services
                            </th>
                            @if(Auth::user()->role == 2)
                                <th class="px-6 py-2 text-xl text-gray-500">
                                    Update
                                </th>
                                <th class="px-6 py-2 text-xl text-gray-500">
                                    Delete
                                </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($gyms as $gym)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-md text-gray-500">
                                    {{$gym->city}}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-md text-gray-900">
                                        <b>{{$gym->name}}</b>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @foreach($gym->service as $service)
                                        <div class="text-md text-gray-500">{{$service->service_name}} - <b>{{$service->type}}</b></div>
                                    @endforeach
                                </td>
                                @if(Auth::user()->role == 2)
                                    <td class="px-6 py-4">
                                        <a href="/update/{{$gym['id']}}" class="px-4 py-1 text-md text-white bg-blue-400 rounded">Edit</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="/delete/{{$gym['id']}}" class="px-4 py-1 text-md text-white bg-red-400 rounded">Delete</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$gyms->links()}}
    </div>
</div>
    


@endsection