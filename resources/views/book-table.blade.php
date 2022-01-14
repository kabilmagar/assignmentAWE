<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books Table') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8"> 
            @if(session()->has('message'))   
                <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                    <div>
                        <span class="font-medium">{{session()->get('message')}}</span>
                    </div>
                </div>
            @endif 
            @if(auth()->user()->role=='admin')
                <div class="flex justify-end mb-4">
                    <a class="p-2 pl-5 pr-5 bg-green-500 text-gray-100 text-lg rounded-lg focus:border-4 border-green-300" href="{{url('save-book')}}">Add Books</a> 
                </div>
            @endif    
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">ID</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Author</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Name</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Page</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Price</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Created At</th>
                                @if(auth()->user()->role=='admin')
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Actions</th>
                                @endif    
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse($details as $key=>$row)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm leading-5 text-gray-800">{{++$key}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                        <div class="text-sm leading-5 text-blue-900">{{$row->author}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$row->name}}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$row->page}}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                        {{$row->price}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                        {{$row->created_at}}
                                    </td>
                                    @if(auth()->user()->role=='admin')
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                                            <a class="px-5 py-2 bg-green-500 text-white rounded transition duration-300 hover:bg-green-800  focus:outline-none" href="{{url('save-book/'.$row->id)}}">Edit</a>
                                            <a class="px-5 py-2 bg-red-500 text-white rounded transition duration-300 hover:bg-red-800  focus:outline-none" onclick="return confirm('Are you sure?')" href="{{url('delete-book/'.$row->id)}}">Delete</a>
                                        </td>
                                    @endif    
                                </tr>
                            @empty
                                <tr><td colspan="7" class="text-red-500 p-4 text-center">* No Records Found</td></tr>
                            @endforelse    
                        </tbody>
                    </table>
                    <div class="my-2">{{$details->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
