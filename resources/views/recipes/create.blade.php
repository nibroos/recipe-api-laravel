<x-app-layout>
  <title>New Recipe</title>
  <div>
    <div class="max-w-2xl mx-auto sm:p-0 lg:px-8">
      <div class="mt-5 md:mt-0 md:col-span-2">
        {{-- form start --}}
        <form method="post" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
          @csrf
          {{-- hidden input id --}}
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
          <div class="overflow-hidden sm:rounded-md">
            <h1 class="text-center px-6 md:pt-6 text-2xl font-extrabold text-gray-900 xs:text-xl">Add Recipe</h1>
            <p class="mb-6 px-6 text-base text-center text-gray-500 text-opacity-75 xs:text-sm">Any new recipe that we
              can add?</p>
            <div class="border-t-4 border-indigo-400 bg-white rounded-lg">
              <div class="pt-4 grid grid-cols-1 divide-y divide-gray-300">
                <div>
                  <h1 class="mb-4 px-6 text-2xl font-bold text-gray-900 xs:text-lg">General Information</h1>
                </div>
                <div></div>
              </div>
              {{-- recipe general input --}}
              <div class="p-6">
                {{-- recipe name input --}}
                <div class="mb-6 f-outline relative border focus-within:border-indigo-400">
                  <input type="text" name="name" id="name" placeholder=" "
                    class="block p-2 w-full text-lg appearance-none focus:outline-none bg-transparent"
                    value="{{ old('name', '') }}" />
                  <label for="name"
                    class="absolute ml-3 px-2 top-0 text-lg text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">Recipe
                    Name<span class="text-red-600"> *</span></label>
                </div>
                <div class="mb-5 f-outline relative border focus-within:border-indigo-400">
                  <input type="number" name="servings" id="servings" placeholder=" "
                    class="block p-2 w-full text-lg appearance-none focus:outline-none bg-transparent resize-none">
                  <label for="servings"
                    class="absolute ml-3 px-2 top-0 text-lg text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">
                    Servings<span class="text-red-600"> *</span></label>
                </div>
                <div class="mb-5 f-outline relative border focus-within:border-indigo-400">
                  <input type="number" name="quantity" id="quantity" placeholder=" "
                    class="block p-2 w-full text-lg appearance-none focus:outline-none bg-transparent resize-none">
                  <label for="quantity"
                    class="absolute ml-3 px-2 top-0 text-lg text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">
                    Quantity<span class="text-red-600"> *</span></label>
                </div>
                <div class="mb-5 f-outline relative border focus-within:border-indigo-400">
                  <input type="number" name="energy" id="energy" placeholder=" "
                    class="block p-2 w-full text-lg appearance-none focus:outline-none bg-transparent resize-none">
                  <label for="energy"
                    class="absolute ml-3 px-2 top-0 text-lg text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">Energy<span
                      class="text-red-600"> *</span></label>
                </div>
                <div class="mb-5 f-outline relative border focus-within:border-indigo-400">
                  <input type="number" name="protein" id="protein" placeholder=" "
                    class="block p-2 w-full text-lg appearance-none focus:outline-none bg-transparent resize-none">
                  <label for="protein"
                    class="absolute ml-3 px-2 top-0 text-lg text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">Protein<span
                      class="text-red-600"> *</span></label>
                </div>
                <div class="mb-5 f-outline relative border focus-within:border-indigo-400">
                  <input type="number" name="fat" id="fat" placeholder=" "
                    class="block p-2 w-full text-lg appearance-none focus:outline-none bg-transparent resize-none">
                  <label for="fat"
                    class="absolute ml-3 px-2 top-0 text-lg text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">Fat<span
                      class="text-red-600"> *</span></label>
                </div>
                <div class="mb-5 f-outline relative border focus-within:border-indigo-400">
                  <input type="number" name="carb" id="carb" placeholder=" "
                    class="block p-2 w-full text-lg appearance-none focus:outline-none bg-transparent resize-none">
                  <label for="carb"
                    class="absolute ml-3 px-2 top-0 text-lg text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">Carb<span
                      class="text-red-600"> *</span></label>
                </div>
                <div class="flex">
                  <a href="{{ $backurl }}"
                    class="hidden sm:mt-4 sm:mr-2 bg-white border border-indigo-500 text-indigo-500 font-bold rounded-md hover:text-white hover:border-indigo-700 hover:bg-indigo-700 py-2 px-5 sm:inline-flex items-center transition sm:w-full sm:justify-center sm:py-3">
                    <span class="mr-2 text-lg">Cancel</span>
                  </a>
                  <button type="submit"
                    class="hidden sm:mt-4 sm:ml-2 bg-indigo-500 text-white font-bold rounded-md hover:bg-indigo-700 py-2 px-5 sm:inline-flex items-center transition sm:w-full sm:justify-center sm:py-3">
                    <span class="mr-2 text-lg">Add</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="2"
                      width="12" height="12" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd">
                      <path
                        d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            {{-- submit button --}}
            <div class="flex items-center justify-end md:justify-center py-6 text-right sm:items-stretch sm:hidden">
              <a href="{{ $backurl }}"
                class="cursor-pointer mr-4 bg-white border border-indigo-500 text-indigo-500 font-bold rounded hover:text-white hover:border-indigo-700 hover:bg-indigo-700 py-2 px-5 inline-flex items-center transition md:w-full md:justify-center md:py-3">
                <span class="mr-2">Cancel</span>
              </a>
              <button type="submit"
                class="bg-indigo-500 text-white font-bold rounded hover:bg-indigo-700 shadow-md py-2 px-5 inline-flex items-center transition md:w-full md:justify-center md:py-3">
                <span class="mr-2">Add New</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="2"
                  width="12" height="12" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd">
                  <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z" />
                </svg>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</x-app-layout>
