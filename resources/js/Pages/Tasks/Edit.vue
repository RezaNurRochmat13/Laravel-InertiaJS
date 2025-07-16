<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
const props = defineProps({ task: Object });

const form = useForm({
  title: props.task.title,
  description: props.task.description,
});

function submit() {
  console.log('Submitting to:', `/tasks/${props.task.id}`);
  form.patch(`/tasks/${props.task.id}`, {
    preserveScroll: true,
    onFinish: () => console.log("Done"),
  });
}
</script>

<template>
  <div>
    <h1 class="text-xl font-bold mb-4">Edit Task</h1>
    <form @submit.prevent="submit">
      <input v-model="form.title" class="border p-1 block mb-2 w-full" />
      <input v-model="form.description" class="border p-1 block mb-2 w-full" />
      <button class="bg-blue-500 text-white px-3 py-1">Update</button>
    </form>
  </div>
</template>

<style scoped></style>
