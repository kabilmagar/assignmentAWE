<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">    
            <div class="bg-white shadow xl:w-3/4 2xl:w-4/5 w-full px-6 sm:px-12 py-5 sm:py-10">
                <div class="mb-5 sm:mb-10 rounded-tl-lg rounded-tr-lg">
                    <div class="sm:flex items-center justify-between">
                        <div class="flex items-center mt-4 sm:mt-0">
                            <button onclick="popuphandler(true)" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex ml-3 whitespace-nowrap items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                                <p class="text-xs sm:text-sm font-medium leading-none text-white">New Invoice</p>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead>
                                <tr class="h-20 w-full text-sm leading-none text-gray-600">
                                    <th tabindex="0" class="focus:outline-none font-normal text-left pl-4">Date</th>
                                    <th tabindex="0" class="focus:outline-none font-normal text-left pl-10">Invoice #</th>
                                    <th tabindex="0" class="focus:outline-none font-normal text-left pl-10">Customer</th>
                                    <th tabindex="0" class="focus:outline-none font-normal text-left pl-10">Amount</th>
                                    <th tabindex="0" class="focus:outline-none font-normal text-left pl-10">Status</th>
                                    <th tabindex="0" class="focus:outline-none font-normal text-left pl-10">Category</th>
                                </tr>
                            </thead>
                            <tbody class="w-full">
                                <tr class="h-20 text-sm leading-none text-gray-700 border-b border-t border-gray-200 bg-white hover:bg-gray-100">
                                    <td tabindex="0" class="focus:outline-none pl-4">06/02/2020</td>
                                    <td tabindex="0" class="focus:outline-none pl-10">IDO-2985-2</td>
                                    <td class="pl-10">
                                        <div class="flex items-center">
                                            <span tabindex="0" class="focus:outline-none">Miracle Botos</span>
                                        </div>
                                    </td>
                                    <td tabindex="0" class="focus:outline-none pl-10">$2100.00</td>
                                    <td class="pl-10">
                                        <div class="w-20 h-6 flex items-center justify-center bg-blue-100 rounded-full">
                                            <p tabindex="0" class="focus:outline-none text-xs leading-3 text-blue-700">Approved</p>
                                        </div>
                                    </td>
                                    <td tabindex="0" class="focus:outline-none pl-10">Business</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
