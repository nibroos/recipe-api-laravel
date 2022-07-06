<x-app-layout>

  <title>{{ $data['title'] }}</title>
  <div>
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200 w-full">
                <tr class="border-b">
                  <th scope="col"
                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{ $recipe->id }}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col"
                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{ $recipe->name }}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col"
                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Servings
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{ $recipe->servings }}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col"
                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Quantity
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{ $recipe->quantity }} g
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col"
                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Energy
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{ $recipe->energy }} kcal
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col"
                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Created At
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{ date('F j, Y', strtotime($recipe->created_at)) }}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col"
                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Update At
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{ date('F j, Y', strtotime($recipe->updated_at)) }}
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="flex mt-6 justify-end">
        <a href="{{ $backurl }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Back
          to list</a>
      </div>
    </div>
  </div>
</x-app-layout>