<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <div class="menu w-64 bg-white shadow-md hidden md:block">
        <div class="p-6">
            <h1 class="text-2xl font-bold text-gray-800">MyApp</h1>
        </div>
        <nav class="mt-6 px-4 space-y-2">
            <Link href="/tasks" class="block px-4 py-2 rounded hover:bg-gray-200 text-gray-700 font-medium">
            Tasks
            </Link>
            <Link href="/employees" class="block px-4 py-2 rounded hover:bg-gray-200 text-gray-700 font-medium">
            Employees
            </Link>
        </nav>
    </div>
</template>

<style scoped></style>
