
    <main class="flex-grow container mx-auto px-4 py-8">
        <section class="bg-gray-800 rounded-xl shadow-lg p-6 max-w-2xl mx-auto my-4">
            <!-- Post Header -->
            <div class="flex items-center space-x-3 mb-4">
                <img src="{{ $post->user->profile_picture ? asset('storage/' . $post->user->profile_picture) : asset('storage/uploads/default_avatar.jpg') }}"
                     class="w-12 h-12 rounded-full border-2 border-gray-600" alt="Profile Picture">
                <div>
                    <h3 class="text-lg font-semibold text-gray-100">{{ $post->user->name }}</h3>
                    <p class="text-sm text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <hr class="border-gray-700 my-4">

            <!-- Post Content -->
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-white mb-2">{{ $post->title }}</h2>
                <p class="text-gray-200 text-lg leading-relaxed">{{ $post->content }}</p>
                @if($post->image_url)
                    <img src="{{ asset('storage/' . $post->image_url) }}"
                         class="mt-3 w-full rounded-lg border-2 border-gray-700 shadow-md"
                         alt="Post Image">
                @endif
            </div>

            <!-- Post Actions -->
            <div class="flex justify-between items-center border-t border-gray-700 pt-3">
                <div class="flex space-x-4">
                    <a href="{{ route('posts.index') }}"
                       class="text-blue-400 hover:text-blue-200 flex items-center space-x-1 px-3 py-1 rounded hover:bg-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <span>View Other Posts</span>
                    </a>
                    <a href="{{ route('posts.edit', $post->id) }}"
                       class="text-yellow-400 hover:text-yellow-200 flex items-center space-x-1 px-3 py-1 rounded hover:bg-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span>Edit</span>
                    </a>
                </div>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="text-red-400 hover:text-red-200 flex items-center space-x-1 px-3 py-1 rounded hover:bg-gray-700"
                            onclick="return confirm('Are you sure you want to delete this post?')">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0H6a1 1 0 00-1 1v1h14V4a1 1 0 00-1-1h-4m-5 4v12m10-12v12"/>
                        </svg>
                        <span>Delete</span>
                    </button>
                </form>
            </div>
        </section>
    </main>
