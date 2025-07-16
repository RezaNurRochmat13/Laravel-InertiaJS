<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { ClipboardIcon, UsersIcon } from '@heroicons/vue/24/outline';
</script>

<template>
    <div class="menu w-64 bg-white shadow-md hidden md:block">
        <div class="p-6">
            <h1 class="text-2xl font-bold text-gray-800">MyApp</h1>
        </div>
        <nav class="mt-6 px-4 space-y-2">
            <Link href="/tasks" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-200 text-gray-700 font-medium">
                <ClipboardIcon class="h-5 w-5" />
                Tasks
            </Link>

            <Link href="/employees" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-200 text-gray-700 font-medium">
                <UsersIcon class="h-5 w-5" />
                Employees
            </Link>
        </nav>
    </div>
</template>

<style scoped></style>
