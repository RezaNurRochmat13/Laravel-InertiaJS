<script setup>
    defineProps({ task: Object });
</script>

<template>
  <div class="task-single">
        <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 space-y-4">
        <h1 class="text-2xl font-bold text-gray-800 border-b pb-2">Task Detail</h1>

        <div class="text-gray-700 space-y-2">
        <p>
            <span class="font-semibold text-gray-900">Title:</span>
            {{ task.title }}
        </p>
        <p>
            <span class="font-semibold text-gray-900">Description:</span>
            {{ task.description }}
        </p>
        </div>

        <div>
        <a href="/tasks" class="inline-block text-sm text-blue-600 hover:text-blue-800 font-medium">
            ← Back to Tasks
        </a>
        </div>
    </div>
  </div>
</template>


<style scoped></style>
