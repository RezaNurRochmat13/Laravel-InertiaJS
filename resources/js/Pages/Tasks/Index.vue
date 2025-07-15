<script setup>
    defineProps({ tasks: Array });
</script>

<template>
  <div>
    <h1 class="text-xl font-bold mb-4">Tasks</h1>
    <a href="/tasks/create" class="text-blue-500 underline">+ Add New</a>
    <ul class="mt-4 space-y-2">
      <li v-for="task in tasks" :key="task.id" class="border p-2">
        {{ task.title }} ({{ task.description }})
      </li>
    </ul>
  </div>
</template>

<style scoped></style>
