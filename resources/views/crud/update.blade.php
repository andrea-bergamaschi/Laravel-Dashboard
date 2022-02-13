@extends('dashboard')

@section('content')
<div class="container flex justify-center mx-auto text-center">
    <div class="flex flex-col">
        <div class="w-full">
            <p class="py-3 text-xl">Add a new gym to the database</p>
            <form action="" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="name" placeholder="Gym name" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 my-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-700" value="{{$gym->name}}">
                <input type="text" name="city" class="my-2 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-700" placeholder="City" value="{{$gym->city}}">

                <div class="grid grid-cols-4 gap-2">
                    @foreach($services as $service)
                
                        <div class="flex justify-start">
                            <input type="checkbox" id="{{"service$service->id"}}" name="service[]" value="{{$service->id}}" class="mr-2 mt-1"
                            
                            @foreach($gymServices as $gymService)
                                @if($service->id == $gymService->pivot->service_id)
                                    {{"checked"}}
                                @endif
                            @endforeach

                            >
                            
                            <label for="{{"service$service->id"}}">{{"$service->service_name"}}
                            </label>
                        </div>
                    @endforeach
                </div>

                <input class="my-2 shadow bg-gray-800 hover:bg-purple-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
            </form>
        </div>
    </div>
</div>

@endsection 