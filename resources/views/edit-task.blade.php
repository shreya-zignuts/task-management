<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Task') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="/test/update/{{ $task->tasks_id}}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-text-input id="users_id" name="users_id" type="hidden" class="mt-1 block w-full" required autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('users_id')" />
        </div>
        
        <div>
            <x-input-label for="taskname" :value="__('Task Name')" />
            <x-text-input id="taskname" name="taskname" type="text" class="mt-1 block w-full" required autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('taskname')" />
        </div>
        
        <div>
            <x-input-label for="description" :value="__(' Description ')" />
            <textarea id="description" name="description" class="mt-1 block w-full" required autocomplete="name"></textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>
        <div>
            <x-input-label for="due_date" :value="__('Due Date')" />
            <x-text-input id="due_date" name="due_date" type="date" class="mt-1 block w-full" required autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('due_date')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
</div>

</x-app-layout>

