<script setup>
    defineProps({
        tasks: Array ,
        flash: Object,
    });


    function destroy(id) {
        if (confirm('Are you sure?')) {
            Inertia.delete(`/tasks/${id}`);
        }
    }
    </script>

<template>
  <div>
    <h1 class="text-xl font-bold mb-4">Tasks</h1>
    <div v-if="flash?.success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
      {{ flash.success }}
    </div>
    <a href="/tasks/create" class="text-blue-500 underline">+ Add New</a>
    <ul class="mt-4 space-y-2">
      <li v-for="task in tasks" :key="task.id" class="border p-2">
         <div>
          {{ task.title }} ({{ task.description }})
        </div>
        <div class="space-x-2 mt-2">
          <a :href="`/tasks/${task.id}`" class="text-blue-500 underline">Show</a>
          <a :href="`/tasks/${task.id}/edit`" class="text-yellow-500 underline">Edit</a>
          <button @click="destroy(task.id)" class="text-red-500 underline">Delete</button>
        </div>
      </li>
    </ul>
  </div>
</template>

<style scoped></style>
