<header>
  <nav class="bg-gray-900 border-gray-200 p-5">
    <div class="container mx-auto flex flex-wrap items-center justify-end">
      <button data-collapse-toggle="mobile-menu" type="button" class="md:hidden ml-3 text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-300 rounded-lg inline-flex items-center justify-center" aria-controls="mobile-menu-2" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
      <div class="hidden md:block w-full md:w-auto" id="mobile-menu">
        <ul class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-sm md:font-medium">
          <li>
            <a href="{{url('/')}}" class="md:bg-transparent text-white block pl-3 pr-4 py-2 md:p-0 rounded hover:text-blue-700" aria-current="page">Home</a>
          </li>
          @if(Auth::check())
            <li>
              <a href="{{url('/dashboard')}}" class="md:bg-transparent text-white block pl-3 pr-4 py-2 md:p-0 rounded hover:text-blue-700" aria-current="page">Dashboard</a>
            </li>
          @endif  
          @if(!Auth::check())
            <li>
              <a href="{{url('login')}}" class="text-white hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">Login</a>
            </li>

            <li>
              <a href="{{url('register')}}" class="text-white hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">Register</a>
            </li>
          @else
            <li class="cursor-pointer">
              <form action="{{route('logout')}}" id="logout-form" method="POST">
                @csrf
                <a class="text-white hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              </form>
            </li>
          @endif  
        </ul>
      </div>
    </div>
  </nav>
</header>