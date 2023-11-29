<x-app-layout>

    @if(session()->has('created'))
        <div class="w-full p-2 m-0 mb-6">
            <p class="w-full p-4 bg-green-500 text-white rounded">
                <i class="text-xl fa fa-check-circle text-green-200 bg-green-800 rounded-full mr-4 p-2"></i>
                The definition "{{ session()->get('created') }} was created successfully.
            </p>
        </div>
    @endif
    @if(session()->has('updated'))
        <div class="w-full p-2 m-0 mb-6">
            <p class="w-full p-4 bg-amber-500 text-white rounded">
                <i class="fa fa-check-circle text-amber-200 bg-amber-800 rounded-full mr-4 p-2"></i>
                The definition "{{ session()->get('updated') }} was updated successfully.
            </p>
        </div>
    @endif
        @if(session()->has('updatedOwn'))
            <div class="w-full p-2 m-0 mb-6">
                <p class="w-full p-4 bg-amber-500 text-white rounded">
                    <i class="fa fa-check-circle text-amber-200 bg-amber-800 rounded-full mr-4 p-2"></i>
                    You don`t have permission to change the definition {{ session()->get('updated') }}
                </p>
            </div>
        @endif
        @if(session()->has('deletedOwn'))
            <div class="w-full p-2 m-0 mb-6">
                <p class="w-full p-4 bg-purple-500 text-white rounded">
                    <i class="fa fa-check-circle text-purple-200 bg-purple-800 rounded-full mr-4 p-2"></i>
                   You don`t have permission to delete {{ session()->get('deleted') }}
                </p>
            </div>
        @endif
    @if(session()->has('deleted'))
        <div class="w-full p-2 m-0 mb-6">
            <p class="w-full p-4 bg-purple-500 text-white rounded">
                <i class="fa fa-check-circle text-purple-200 bg-purple-800 rounded-full mr-4 p-2"></i>
                The definition"{{ session()->get('deleted') }} was deleted successfully.
            </p>
        </div>
    @endif

        <div class="font-semibold leading-tight
                   text-xl text-gray-800 dark:text-gray-200">
            <h2 class="font-semibold leading-tight
                   text-xl text-gray-800 dark:text-gray-200 text-center">
                {{ __('Definitions') }}
            </h2>
        </div>

    <div class="flex flex-row py-2 px-4 pt-4">
    <div class="px-4 py-2 gap-4">
        <span class=" w-1/10 w-12"></span>
        <p>
            <a href="{{ route('definitions.create') }}"
               class="rounded-lg gap-4 p-3 bg-blue-900 text-white
                        hover:bg-blue-100 hover:text-blue-900
                        transition ease-in-out duration-500"
            >Add New Definition</a>
        </p>
    </div>
        <div class="px-4 py-2 gap-4">
            <span class="w-1/10 w-12"></span>
            <p>
                <a href="{{ route('definitions.indexOwnDefinitions') }}"
                   class="rounded-lg gap-4 p-3 bg-blue-900 text-white
                        hover:bg-blue-100 hover:text-blue-900
                        transition ease-in-out duration-500"
                >My Own Definitions</a>
            </p>
        </div>
    </div>
    <div >
    <form action="{{route('definitions.index')}}" method="get" class="w-full p-2 m-0 mb-6" >

        <div class="w-full p-2 mt-6 mb-2">

            <input type="text" id="output" class="w-3/4 p-2 m-0 mb-4 " value="{{$searchFor??''}}" name="search" placeholder="Search definition...">
            <button type="submit" class="btn flex-fill w-20 flex-fill px-4 py-2 bg-gray-800 text-white hover:bg-gray-500">Search</button>
            <button onclick="eraseText();" type="submit" name="clear" class="btn w-20 flex-fill px-2 py-2 bg-gray-800 text-white hover:bg-gray-500">
                Clear</button>
        </div>

    </form>
    </div>
    <table class="table-auto rounded-lg w-full bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 shadow">
        <thead class="rounded-t-lg border-gray-300 border-b text-left">
        <tr class="">
            <th class="p-2 ">Row</th>
            <th class="p-2 ">Word</th>
            <th class="p-2 ">Definitions</th>

            <th class="p-2 w-1/6">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($definitions as $definition)
            <tr class="odd:bg-gray-50 even:bg-gray-200">

                <td class="p-2">{{$definition->id  }}</td>

                <td class="p-2">

                        {{$definition->word->word}}
                </td>
                <td class="p-2">{{$definition->definition}}</td>

                <td class="p-2 grid grid-cols-3 gap-2">
                    <a href="{{ route('definitions.show',['definition'=>$definition->id]) }}"
                       class="text-center p-2
                          text-white rounded-md
                          bg-green-500 hover:bg-green-900
                          dark:bg-green-800 dark:hover:bg-green-500
                          transition ease-in-out duration-300">
                        <i class="fa fa-eye"></i>
                        <span class="sr-only">Show</span>
                    </a>

                    <a href="{{ route('definitions.edit',['definition'=>$definition->id]) }}"
                       class="text-center p-2
                          text-white rounded-md
                          bg-orange-500 hover:bg-orange-900
                          dark:bg-orange-800 dark:hover:bg-orange-500
                          transition ease-in-out duration-300">
                        <i class="fa fa-edit"></i>
                        <span class="sr-only">Edit</span>
                    </a>

                    <a href="{{ route('definitions.delete',['definition'=>$definition->id]) }}"
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
                {{ $definitions->links() }}
            </td>
        </tr>
        </tfoot>
    </table>
        <script>
            function eraseText() {
                document.getElementById("output").value = "";
            }
        </script>

</x-app-layout>
