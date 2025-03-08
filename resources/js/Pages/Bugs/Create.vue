<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
defineProps({ projects: Array });

const form = useForm({
    title: '',
    description: '',
    status: 'open',
    project_id: projects.length ? projects[0].id : '',
});

const submit = () => {
    form.post(route('bugs.store'));
};
</script>

<template>
    <Head title="Bugs" />
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Bugs
            </h2>
        </template>
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-4">Report a New Bug</h1>
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

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Report Bug</button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
