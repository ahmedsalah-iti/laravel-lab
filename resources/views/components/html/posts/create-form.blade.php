<x-layout.app>
    <x-slot:title>Create new Post</x-slot>
    <main class="flex-grow container mx-auto px-4 py-8 max-w-3xl">
<section class="bg-gray-800 rounded-xl fb-shadow p-6 md:p-8">
    <div class="flex items-center space-x-3 mb-6">
        <svg class="w-8 h-8 text-blue-400 icon-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15.414a2 2 0 01-2.828 0l-4.586-4.586a2 2 0 010-2.828z" />
        </svg>
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-100">Create a New Post</h2>
    </div>
    <form method="POST" action="{{ $action ?? route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-300 mb-2 flex items-center space-x-2">
                <svg class="w-5 h-5 text-gray-400 icon-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span>Title</span>
            </label>
            <div class="relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 icon-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <input
                    type="text"
                    id="title"
                    name="title"
                    required
                    value="{{ old('title') }}"
                    class="w-full pl-10 pr-4 py-3 rounded-lg border fb-border bg-gray-700 text-gray-100 focus:fb-focus focus:border-blue-400 text-lg placeholder-gray-500 transition-all duration-200"
                    placeholder="What's the title of your post?"
                >
                    @error('title')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
            </div>
        </div>

        <!-- Content -->
        <div class="mt-6">
            <label for="content" class="block text-sm font-medium text-gray-300 mb-2 flex items-center space-x-2">
                <svg class="w-5 h-5 text-gray-400 icon-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
                <span>Content</span>
            </label>
            <div class="relative">
                <svg class="absolute left-3 top-4 w-5 h-5 text-gray-400 icon-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
                <textarea
                id="content"
                name="content"
                required
                rows="6"
                class="w-full pl-10 pr-4 py-3 rounded-lg border fb-border bg-gray-700 text-gray-100 focus:fb-focus focus:border-blue-400 text-lg placeholder-gray-500 resize-none transition-all duration-200"
                placeholder="What's on your mind?"
                >{{ old('content') }}</textarea>

                @error('content')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
<!-- Image -->
<div class="mt-6">
    <label for="image" class="block text-sm font-medium text-gray-300 mb-2 flex items-center space-x-2 cursor-pointer">
        <svg class="w-5 h-5 text-gray-400 icon-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M16 3H8a2 2 0 00-2 2v2h12V5a2 2 0 00-2-2zM12 12l-3 4h6l-3-4z" />
        </svg>
        <span>Upload Image (optional)</span>
    </label>
    <div class="relative">
        <input
            type="file"
            id="image"
            name="image"
            accept="image/*"
            class="block w-full text-sm text-gray-300
                file:mr-4 file:py-2 file:px-4
                file:rounded-lg file:border-0
                file:text-sm file:font-semibold
                file:bg-blue-600 file:text-white
                hover:file:bg-blue-700
                transition duration-200
                bg-gray-700 rounded-lg border fb-border focus:outline-none"
        >
        @error('image')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

        <!-- Buttons -->
        <div class="flex justify-end mt-6 space-x-4">
            <a
                href="{{ route('posts.index') }}"
                class="bg-gray-600 text-white px-6 py-3 rounded-lg font-medium text-lg hover:bg-gray-700 transition-all duration-200 fb-shadow flex items-center space-x-2"
            >
                <svg class="w-5 h-5 icon-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span>Cancel</span>
            </a>
            <button
                type="submit"
                class="bg-green-900 text-white px-6 py-3 rounded-lg font-medium text-lg hover:bg-green-700 transition-all duration-200 fb-shadow flex items-center space-x-2"
            >
                <svg class="w-5 h-5 icon-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Add New Post</span>
            </button>
        </div>
    </form>
</section>
    </main>
</x-layout.app>
