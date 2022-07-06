<x-app-layout>
  <title>{{ $data['title'] }}</title>
  <div>
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
      <div class="block mb-8">
        <a href="{{ route('recipes.create') }}"
          class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Add recipe</a>
      </div>
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200 w-full">
                <thead>
                  <tr>
                    <th scope="col" width="50"
                      class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      ID
                    </th>
                    <th scope="col"
                      class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Name
                    </th>
                    <th scope="col"
                      class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Servings
                    </th>
                    <th scope="col"
                      class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Quantity
                    </th>
                    <th scope="col"
                      class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Energy
                    </th>
                    <th scope="col"
                      class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Nutrition
                    </th>
                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @foreach ($recipes as $recipe)
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $recipe->id }}
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $recipe->name }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $recipe->servings }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $recipe->quantity }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $recipe->energy }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="flex flex-row">
                          <div class="basis-1/2 font-bold">Protein</div>
                          <div class="basis-1/2">{{ $recipe->nutrition->protein }}</div>
                        </div>
                        <div class="flex flex-row">
                          <div class="basis-1/2 font-bold">Fat</div>
                          <div class="basis-1/2">{{ $recipe->nutrition->fat }}</div>
                        </div>
                        <div class="flex flex-row">
                          <div class="basis-1/2 font-bold">Carbs</div>
                          <div class="basis-1/2">{{ $recipe->nutrition->carb }}</div>
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('recipes.show', Str::slug($recipe->name)) }}"
                          class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                        <a href="{{ route('recipes.edit', Str::slug($recipe->name)) }}"
                          class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                        <form class="inline-block" action="{{ route('recipes.destroy', $recipe->id) }}"
                          method="POST" onsubmit="return confirm('Are you sure?');">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</x-app-layout>
