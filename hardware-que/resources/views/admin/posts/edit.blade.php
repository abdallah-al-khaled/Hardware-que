<x-layout>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="border border-gray-200 p-6 rounded-xl m-6 max-w-4xl mx-auto">
    <form action="/admin/posts" method="POST" enctype="multipart/form-data">
        {{-- since we are uploading a file we need to select encoder type  --}}
        @csrf
        
        <x-form.input name='title' :value="old('title', $post->title)" />

        <x-form.input name='slug' :value="old('slug', $post->slug)" />

        <x-form.input name='thumbnail' type='file' :value="old('thumbnail', $post->thumbnail)" />
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="150">


        <x-form.textarea name='excerpt'>{{ old('excerpt', $post->excerpt) }}</x-form.textarea>

        <x-form.textarea name='body'>{{ old('body', $post->body) }}</x-form.textarea>

       
            <x-form.label name='category'/>

                <select name="category_id">

                    @foreach (\App\Models\Category::all() as $category)
                        <option 
                            value="{{ $category->id }}" 
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }} 
                        >{{ $category->name }}</option>
                    @endforeach
                </select>

            <x-form.error name='category'/>
        
                <button type="submit" 
                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl"
                >
                    edit
                </button>

               
    </form>
</div>
</x-layout>