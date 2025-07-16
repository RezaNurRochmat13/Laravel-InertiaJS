<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
  <div class="min-h-screen flex bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md hidden md:block">
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
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Navbar -->
      <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
        <div>
          <!-- Tempat avatar / logout -->
          <span class="text-gray-500">Hi, User</span>
        </div>
      </header>

      <!-- Page Content -->
      <main class="flex-1 p-6">
        <slot />
      </main>
    </div>
  </div>
</template>
