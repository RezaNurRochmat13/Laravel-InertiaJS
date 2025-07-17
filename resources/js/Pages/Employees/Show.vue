<script setup>
defineProps({ employee: {
    type: Object,
    default: () => ({}),
} });

</script>

<template>
  <div class="employee-single">
        <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 space-y-4">
        <h1 class="text-2xl font-bold text-gray-800 border-b pb-2">Employee Detail</h1>

        <div class="text-gray-700 space-y-2">
        <p>
            <span class="font-semibold text-gray-900">Name:</span>
            {{ employee.name }}
        </p>
        <p>
            <span class="font-semibold text-gray-900">Email:</span>
            {{ employee.email }}
        </p>
        <p>
            <span class="font-semibold text-gray-900">Address:</span>
            {{ employee.address }}
        </p>
        <p>
            <span class="font-semibold text-gray-900">Phone:</span>
            {{ employee.phone }}
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
