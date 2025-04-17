
    <main class="flex-grow container mx-auto px-4 py-8 max-w-3xl">

<section class="bg-gray-900 rounded-2xl shadow-lg p-8 md:p-12 max-w-lg mx-auto">
    <div class="flex flex-col items-center mb-8">
        @if ($status === 'success')
            <svg class="w-24 h-24 text-green-400 animate-check mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
            </svg>
            <h2 class="text-4xl md:text-5xl font-bold text-green-400">Success</h2>
        @else
            <svg class="w-24 h-24 text-red-500 animate-xmark mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <h2 class="text-4xl md:text-5xl font-bold text-red-500">Failed</h2>
        @endif
    </div>
    <div class="text-center">
        <p class="text-2xl text-gray-200 mb-10 inline-block {{ $status === 'success' ? 'typing-animation-success' : 'typing-animation-fail' }}">
            {{ $message ?? "Something went wrong. Please try again"}}
        </p>
        <a
            href="{{ route('posts.index') }}"
            class="bg-blue-600 text-white px-10 py-5 rounded-xl font-semibold text-xl hover:bg-blue-700 transition-all duration-300 shadow-md flex items-center space-x-4 mx-auto w-fit animate-fade-in"
        >
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span>Back to Home</span>
        </a>
    </div>
</section>
    </main>

