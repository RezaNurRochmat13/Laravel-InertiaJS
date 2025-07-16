<script setup>
    defineProps({ task: Object });
</script>

<template>
  <div>
    <h1 class="text-xl font-bold mb-2">Task Detail</h1>
    <p><strong>Title:</strong> {{ task.title }}</p>
    <p><strong>Description:</strong> {{ task.description }}</p>
    <a href="/tasks" class="text-blue-500 underline mt-4 inline-block">← Back</a>
  </div>
</template>


<style scoped></style>
