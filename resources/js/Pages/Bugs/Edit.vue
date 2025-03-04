<script setup>
import { useForm } from '@inertiajs/vue3';
defineProps({ bug: Object, projects: Array });

const form = useForm({
    title: bug.title,
    description: bug.description,
    status: bug.status,
    project_id: bug.project_id,
});

const submit = () => {
    form.put(route('bugs.update', bug.id));
};
</script>

<template>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Edit Bug</h1>
        <form @submit.prevent="submit" class="space-y-4">
            <input v-model="form.title" placeholder="Bug Title" class="border p-2 rounded w-full" required />
            <textarea v-model="form.description" placeholder="Bug Description" class="border p-2 rounded w-full" required></textarea>

            <select v-model="form.status" class="border p-2 rounded w-full">
                <option value="open">Open</option>
                <option value="in_progress">In Progress</option>
                <option value="resolved">Resolved</option>
            </select>

            <select v-model="form.project_id" class="border p-2 rounded w-full">
                <option v-for="project in projects" :key="project.id" :value="project.id">
                    {{ project.name }}
                </option>
            </select>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Bug</button>
        </form>
    </div>
</template>
