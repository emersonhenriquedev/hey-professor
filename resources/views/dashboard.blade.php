<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-container>
        <x-form post :action="route('question.store')">
            <x-textarea label="Question" name="question" />
            <x-button.primary>
                Save
            </x-button>
            <x-button.reset>
                Cancel
            </x-button>
        </x-form>
    </x-container>
</x-app-layout>
