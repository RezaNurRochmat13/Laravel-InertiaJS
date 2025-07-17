<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    employee: {
        type: Object,
        default: () => ({}),
    }
});

const form = useForm({
  name: props.employee.name,
  email: props.employee.email,
  address: props.employee.address,
  phone: props.employee.phone
});

function submit() {
  form.patch(`/employees/${props.task.id}`, {
    preserveScroll: true,
    onFinish: () => console.log("Done"),
  });
}
</script>

<template>
  <div>
        <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Edit Employee</h1>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Title</label>
                    <input
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="description">Email</label>
                    <input
                    id="email"
                    v-model="form.email"
                    type="text"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="description">Address</label>
                    <input
                    id="address"
                    v-model="form.address"
                    type="text"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="description">Phone</label>
                    <input
                    id="phone"
                    v-model="form.phone"
                    type="text"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>

                <div class="flex justify-end">
                    <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-md transition"
                    >
                    Update
                    </button>
                </div>
            </form>
    </div>
  </div>
</template>

<style scoped></style>
