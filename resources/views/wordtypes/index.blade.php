<x-app-layout>

    @if(session()->has('created'))
        <div class="w-full p-2 m-0 mb-6">
            <p class="w-full p-4 bg-green-500 text-white rounded">
                <i class="text-xl fa fa-check-circle text-green-200 bg-green-800 rounded-full mr-4 p-2"></i>
                The word type "{{ session()->get('created') }} was created successfully.
            </p>
        </div>
    @endif
    @if(session()->has('updated'))
        <div class="w-full p-2 m-0 mb-6">
            <p class="w-full p-4 bg-amber-500 text-white rounded">
                <i class="fa fa-check-circle text-amber-200 bg-amber-800 rounded-full mr-4 p-2"></i>
                The word type"{{ session()->get('updated') }} was updated successfully.
            </p>
        </div>
    @endif
    @if(session()->has('deleted'))
        <div class="w-full p-2 m-0 mb-6">
            <p class="w-full p-4 bg-purple-500 text-white rounded">
                <i class="fa fa-check-circle text-purple-200 bg-purple-800 rounded-full mr-4 p-2"></i>
                The word type "{{ session()->get('deleted') }} was deleted successfully.
            </p>
        </div>
    @endif

        <div class="flex flex-row px-4 py-8">
        <h2 class="font-semibold leading-tight
                    grow
                   text-xl text-gray-800 dark:text-gray-200">
            {{ __('Word Types') }}
        </h2>
        <p>
            <a href="{{ route('wordtypes.create') }}"
               class="rounded-lg p-2 bg-blue-900 text-white
                        hover:bg-blue-100 hover:text-blue-900
                        transition ease-in-out duration-500"
            >Add New Word Type</a>
        </p>
    </div>
    <table class="table-auto rounded-lg w-full bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 shadow">
        <thead class="rounded-t-lg border-gray-300 border-b text-left">
        <tr class="">
            <th class="p-2 ">Row</th>
            <th class="p-2 ">Name</th>
            <th class="p-2 ">Code</th>
            <th class="p-2 w-1/6">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($wordTypes as $wordType)
            <tr class="odd:bg-gray-50 even:bg-gray-200">
                <td class="p-2">{{ $loop->index + 1 }}</td>
                <td class="p-2">{{ $wordType->name }}</td>
                <td class="p-2">{{ $wordType->code }}
                </td>
                <td class="p-2 grid grid-cols-3 gap-2">
                    <a href="{{ route('wordtypes.show',['wordtype'=>$wordType->id]) }}"
                       class="text-center p-2
                          text-white rounded-md
                          bg-green-500 hover:bg-green-900
                          dark:bg-green-800 dark:hover:bg-green-500
                          transition ease-in-out duration-300">
                        <i class="fa fa-eye"></i>
                        <span class="sr-only">Show</span>
                    </a>

                    <a href="{{route('wordtypes.edit',['wordtype'=>$wordType->id])}}"
                       class="text-center p-2
                          text-white rounded-md
                          bg-orange-500 hover:bg-orange-900
                          dark:bg-orange-800 dark:hover:bg-orange-500
                          transition ease-in-out duration-300">
                        <i class="fa fa-edit"></i>
                        <span class="sr-only">Edit</span>
                    </a>

                    <a href="{{ route('wordtypes.delete',['wordtype'=>$wordType->id]) }}"
                       class="text-center p-2 grow rounded-md
                          text-white
                          bg-red-500 hover:bg-red-800
                          dark:bg-red-800 dark:hover:bg-red-500
                          transition ease-in-out duration-300">
                        <i class="fa fa-times"></i>
                        <span class="sr-only">Delete</span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot class="text-gray-400 border-gray-300 border-t text-left">
        <tr>
            <td colspan="4" class="p-2 rounded-b-lg bg-gray-300">
                {{ $wordTypes->links() }}
            </td>
        </tr>
        </tfoot>
    </table>

</x-app-layout>
