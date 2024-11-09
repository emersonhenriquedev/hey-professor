@props([
    'question'
])
<div class="flex items-center justify-between p-3 text-black bg-white rounded shadow shadow-blue-500/50 dark:bg-gray-800/50 dark:text-gray-400">
    <span class="">{{ $question->question }}</span>
    <div>
        <x-form :action="route('question.like',$question)">
            <button class="flex items-start space-x-1 text-green-500">
                <x-icon.thumbs-up class="w-5 h-5 hover:text-green-300 hover:cursor-pointer" />
                <span>{{ $question->likes }}</span>
            </button>
        </x-form>
        <x-form :action="route('question.like',$question)">
            <button class="flex items-start space-x-1 text-red-500">
                <x-icon.thumbs-down class="w-5 h-5 hover:text-red-300 hover:cursor-pointer" />
                <span>{{ $question->unlikes }}</span>
            </button>
        </x-form>
    </div>
</div>
