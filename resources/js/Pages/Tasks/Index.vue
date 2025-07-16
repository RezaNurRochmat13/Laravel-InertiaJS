<script setup>
import { Inertia } from '@inertiajs/inertia';

  defineProps({
    tasks: Array ,
    flash: Object,
  });


  function destroy(id) {
     if (confirm('Are you sure you want to delete this task?')) {
       Inertia.delete(`/tasks/${id}`, {
       onSuccess: () => {
         console.log('Deleted!');
       }
      });
    }
  }
</script>

<template>
   <div>
    <h1 class="text-2xl font-bold mb-6">Tasks</h1>
    <div class="mb-4">
      <a href="/tasks/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Add New</a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
      <table class="min-w-full table-auto border border-gray-200">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-4 py-2 border-b text-left">#</th>
            <th class="px-4 py-2 border-b text-left">Title</th>
            <th class="px-4 py-2 border-b text-left">Description</th>
            <th class="px-4 py-2 border-b text-left">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(task, index) in tasks" :key="task.id" class="hover:bg-gray-50">
            <td class="px-4 py-2 border-b">{{ index + 1 }}</td>
            <td class="px-4 py-2 border-b">{{ task.title }}</td>
            <td class="px-4 py-2 border-b">{{ task.description }}</td>
            <td class="px-4 py-2 border-b space-x-2">
              <a :href="`/tasks/${task.id}`" class="text-blue-600 hover:underline">Show</a>
              <a :href="`/tasks/${task.id}/edit`" class="text-yellow-600 hover:underline">Edit</a>
              <button @click="destroy(task.id)" class="text-red-600 hover:underline">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped></style>
