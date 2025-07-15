<template>
  <div>
    <h1 class="text-xl font-bold mb-4">Add Tasks</h1>
    <form @submit.prevent="submit">
      <input v-model="form.title" placeholder="Title" class="border p-1 block mb-2 w-full" />
      <input v-model="form.description" placeholder="Description" class="border p-1 block mb-2 w-full" />
      <button type="submit" class="bg-blue-500 text-white px-3 py-1">Submit</button>
    </form>
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
