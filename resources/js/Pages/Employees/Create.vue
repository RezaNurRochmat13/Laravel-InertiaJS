<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
  name: '',
  email: '',
  address: '',
  phone: '',
});

function submit() {
  form.post('/employees');
}
</script>

<template>
  <div>
     <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Add Employee</h1>

        <form @submit.prevent="submit" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Name</label>
            <input
            id="name"
            v-model="form.name"
            placeholder="Enter name"
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="description">Email</label>
            <input
            id="email"
            v-model="form.email"
            placeholder="Enter email"
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="description">Address</label>
            <input
            id="address"
            v-model="form.address"
            placeholder="Enter address"
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="description">Phone</label>
            <input
            id="phone"
            v-model="form.phone"
            placeholder="Enter phone"
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
