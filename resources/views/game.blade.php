<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Save Game') }}
        </h2>
    </x-slot>
 
    <div class="bg-gray-200 min-h-screen pt-2 font-mono">
        <div class="container mx-auto">
            <div class="inputs w-full max-w-2xl p-6 mx-auto">
                @if(session()->has('message'))
                    <div class="py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200" role="alert">
                        {{session()->get('message')}}
                    </div>
                @endif    
    
                <h2 class="text-2xl text-gray-900">Save Game</h2>
                <form class="mt-6 border-t border-gray-400 pt-4" method="POST" action="{{url('post-game')}}">
                    @csrf
                    <input type="hidden" name="id" value="@if(isset($game_details->id)) {{$game_details->id}} @endif"/>
                    <div class='flex flex-wrap -mx-3 mb-6'>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Console</label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' type='text' placeholder='Enter Console'  required name="console" value="@if(isset($game_details->console)){{$game_details->console}} @endif">
                            @error('console')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>

                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-2'>Title</label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-2' type='text' placeholder='Enter Title'  required name="title" value="@if(isset($game_details->title)){{$game_details->title}} @endif">
                            @error('title')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>

                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-3'>Pegi</label>
                            <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-3' type='text' placeholder='Enter Pegi'  required name="pegi" value="@if(isset($game_details->pegi)){{$game_details->pegi}} @endif">
                            @error('pegi')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>
                       
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' >Price</label>
                             <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'  type="number" name="price" @if(isset($game_details->price)) value="{{$game_details->price}}" @endif placeholder="Enter Price" required>
                             @error('price')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' >URL</label>
                             <textarea class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' rows="5" name="url">@if(isset($game_details->url)){{$game_details->url}}@endif</textarea>
                             @error('url')<div class="mt-2"><span class="text-red-500">* {{$message}}</span></div>@enderror
                        </div>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' >Description</label>
                             <textarea class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' rows="5" name="description">@if(isset($game_details->description)){{$game_details->description}}@endif</textarea>
                        </div>
                        <div class="flex justify-end ml-4">
                            <button class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3" type="submit">save changes</button>
                            <a class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3" href="{{url('view-game-table')}}">Go Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>    
