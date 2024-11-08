@props([
    'question'
])
<div class="flex items-center justify-between p-3 text-black bg-white rounded shadow shadow-blue-500/50 dark:bg-gray-800/50 dark:text-gray-400">
    <span class="">{{ $question->question }}</span>
    <div>
        <x-icon.thumbs-up class="w-5 h-5 text-yellow-500 hover:text-yellow-300 hover:cursor-pointer"></x-icon.thumbs-up>
    </div>
</div>
