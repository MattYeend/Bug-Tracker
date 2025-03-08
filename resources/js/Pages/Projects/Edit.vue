<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
defineProps({ project: Object });

const form = useForm({
    name: project.name,
    description: project.description,
    status: project.status,
});

const submit = () => {
    form.put(route('projects.update', project.id));
};
</script>

<template>
    <Head title="Projects" />
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Projects
            </h2>
        </template>
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-4">Edit Project</h1>
            <form @submit.prevent="submit" class="space-y-4">
                <input v-model="form.name" placeholder="Project Name" class="border p-2 rounded w-full" />
                <textarea v-model="form.description" placeholder="Project Description" class="border p-2 rounded w-full"></textarea>
                <select v-model="form.status" class="border p-2 rounded w-full">
                    <option value="pending">Pending</option>
                    <option value="active">Active</option>
                    <option value="completed">Completed</option>
                </select>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
