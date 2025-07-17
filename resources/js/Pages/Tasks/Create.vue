<template>
  <div>
     <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Add Task</h1>

        <form @submit.prevent="submit" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Title</label>
            <input
            id="title"
            v-model="form.title"
            placeholder="Enter title"
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="description">Description</label>
            <input
            id="description"
            v-model="form.description"
            placeholder="Enter description"
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
        </div>

        <div class="flex justify-end">
            <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-md transition"
            >
            Submit
            </button>
        </div>
        </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
  title: '',
  description: '',
});

function submit() {
  form.post('/tasks');
}
</script>
