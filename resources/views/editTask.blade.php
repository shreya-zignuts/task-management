<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="/index"><div class="fs-4 mb-3 mt-2 ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"></path>
                        </svg>
                        </div></a>
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

                        <form method="post" action="{{ route('task.update', ['id' => $task->id]) }}" class="mt-6 space-y-6">
                            @csrf

                            <div>
                                <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full" required autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                            </div>
                            
                            <div>
                                <x-input-label for="title" :value="__('Task Name')" />
                                <x-text-input id="title" name="title" :value="old('title', $task->title)" type="text" class="mt-1 block w-full" required autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>
                            
                            <div>
                                <x-input-label for="description" :value="__(' Description ')" />
                                <textarea id="description" name="description" class="mt-1 block w-full" required autocomplete="name">{{ old('description', $task->description) }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                            <div>
                                <x-input-label for="due_date" :value="__('Due Date')" />
                                <x-text-input id="due_date" name="due_date" type="date" :value="old('due_date', $task->due_date)" class="mt-1 block w-full" required autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('due_date')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button id="saveButton">{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
        </div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("saveButton").addEventListener("click", function() {
            var successMessage = "Task inserted successfully!"; // Replace this with your actual success message
            document.getElementById("success").textContent = success;
        });
    });
</script>

</x-app-layout>

