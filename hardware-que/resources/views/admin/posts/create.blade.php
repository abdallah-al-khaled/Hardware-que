<x-layout>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="border border-gray-200 p-6 rounded-xl m-6 max-w-4xl mx-auto">
    <form action="/admin/posts" method="POST" enctype="multipart/form-data">
        {{-- since we are uploading a file we need to select encoder type  --}}
        @csrf
        
        <x-form.input name='title' />

        <x-form.input name='slug' />

        <x-form.input name='thumbnail' type='file' />

        <x-form.textarea name='excerpt'/>

        <x-form.textarea name='body'/>

       
            <x-form.label name='category'/>

                <select name="category_id">

                    @foreach (\App\Models\Category::all() as $category)
                        <option 
                            value="{{ $category->id }}" 
                            {{ old('category_id') == $category->id ? 'selected' : '' }} 
                        >{{ $category->name }}</option>
                    @endforeach
                </select>

            <x-form.error name='category'/>
        
                <button type="submit" 
                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl"
                >
                    post
                </button>

               
    </form>
</div>
</x-layout>