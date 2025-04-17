<x-layout.app>
    <x-slot:title>Posts</x-slot>
    <main class="flex-grow container mx-auto px-4 py-8 ">
<section class="bg-gray-800 rounded-xl fb-shadow p-9 md:p-9">
    <!-- Header with Title and Create Button -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center space-x-3">
            <svg class="w-8 h-8 text-blue-400 icon-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <a href="{{ route('posts.index') }}">
                <h2 class="text-2xl md:text-3xl font-semibold text-gray-100">Posts</h2>
            </a>
        </div>
        <a href="{{ route('posts.create') }}"
           class="bg-green-900 text-white px-4 py-2 rounded-lg font-medium text-lg hover:bg-green-700 transition-all duration-200 fb-shadow flex items-center space-x-2">
            <svg class="w-5 h-5 icon-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4"/>
            </svg>
            <span>Create New Post</span>
        </a>
    </div>

    <!-- Posts Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-700">
            @if($posts->count() > 0)
                <thead class="bg-gray-700">
                <tr>
                    @foreach(array_keys($posts->first()->getAttributes()) as $column)
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                            @if($column == "user_id")
                            Created_By
                            @else
                            {{ $column}}
                            @endif
                        </th>
                    @endforeach
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                @foreach($posts as $post)
                    <tr class="hover:bg-gray-700 transition-all duration-200">
                        @foreach($post->getAttributes() as $key => $value)
                        <td class="px-6 py-4 text-sm text-gray-100">
                            @if ($key === 'image_url' && $value)
                            <img src="{{ asset('storage/' . $value) }}" class="h-20 w-20 object-cover rounded-lg border-2 border-gradient-to-r from-indigo-900 to-purple-900 shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out"  />
                            @elseif ($key === 'user_id')
                                {{ $post->user->name }}
                            @elseif ($key == 'created_at' || $key == 'updated_at')
                            {{ \Carbon\Carbon::parse($value)->diffForHumans() }}
                            @else
                                {{ $value }}
                            @endif
                        </td>
                    @endforeach

                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('posts.show', $post->id) }}"
                               class="text-blue-500 hover:text-blue-200 mr-6 text-lg">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}"
                               class="text-yellow-500 hover:text-yellow-200 mr-6 text-lg">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-500 hover:text-red-200 text-lg"
                                        onclick="return confirm('Are you sure you want to delete this post?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            @else
                <tbody>
                    <tr>
                        <td colspan="100%" class="text-center py-4 text-gray-300">No posts found.</td>
                    </tr>
                </tbody>
            @endif
        </table>
    </div>

    @if($posts->count() > 1)
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    @endif
</section>
</main>
</x-layout.app>
