<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    description: '',
    status: 'pending',
});

const submit = () => {
    form.post(route('projects.store'));
};
</script>

<template>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Create Project</h1>
        <form @submit.prevent="submit" class="space-y-4">
            <input v-model="form.name" placeholder="Project Name" class="border p-2 rounded w-full" />
            <textarea v-model="form.description" placeholder="Project Description" class="border p-2 rounded w-full"></textarea>
            <select v-model="form.status" class="border p-2 rounded w-full">
                <option value="pending">Pending</option>
                <option value="active">Active</option>
                <option value="completed">Completed</option>
            </select>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</template>
