<x-layout>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">


    <div class="col-span-12 mid mx-auto max-w-4xl">
        <a href="/admin/posts/create" class="text-red-400">Create new post</a>
        <div class="overflow-auto lg:overflow-visible ">
            <table class="table text-gray-400 border-separate space-y-6 text-sm">
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="bg-gray-800">
                            <td class="p-3">
                                <div class="flex align-items-center">
                                    <img class="rounded-full h-12 w-12 "
                                        src="https://images.unsplash.com/photo-1613588718956-c2e80305bf61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80"
                                        alt="unsplash image">
                                    <div class="ml-3">
                                        <div class="mt-2">
                                            <a href="/posts/{{ $post->slug }} ">
                                                {{ $post->title }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-3 hidden">
                            </td>

                            <td class="p-3">
                                <span class="bg-green-400 text-gray-50 rounded-md px-2">Published</span>
                            </td>

                            <td class="font-bold">

                                <form method="POST" action="/admin/posts/{{ $post->id }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="ml-3 mr-3">
                                        <i class="material-icons-round text-base">delete_outline</i>
                                    </button>

                                </form>

                            </td>

                            <td class="p-3">

                                <a href="/admin/posts/{{ $post->id }}/edit"
                                    class="text-blue-500 hover:text-blue-600  mx-2">
                                    <i class="material-icons-outlined text-base ">edit</i>
                                </a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <style>
        .table {
            border-spacing: 0 15px;
        }

        i {
            font-size: 1rem !important;
        }

        .table tr {
            border-radius: 20px;
        }

        tr td:nth-child(n+5),
        tr th:nth-child(n+5) {
            border-radius: 0 .625rem .625rem 0;
        }

        tr td:nth-child(1),
        tr th:nth-child(1) {
            border-radius: .625rem 0 0 .625rem;
        }
    </style>


</x-layout>
