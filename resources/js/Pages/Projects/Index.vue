<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({ projects: Array });
</script>

<template>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Projects</h1>
        <Link :href="route('projects.create')" class="bg-blue-500 text-white px-4 py-2 rounded">New Project</Link>
        <div class="mt-4 grid gap-4">
            <div v-for="project in projects" :key="project.id" class="p-4 border rounded shadow">
                <h2 class="text-xl font-bold">{{ project.name }}</h2>
                <p>{{ project.description }}</p>
                <p>Status: <span class="font-semibold">{{ project.status }}</span></p>
                <div class="mt-2 space-x-2">
                    <Link :href="route('projects.show', project.id)" class="text-green-500">View</Link>
                    <Link :href="route('projects.edit', project.id)" class="text-blue-500">Edit</Link>
                    <Link :href="route('projects.destroy', project.id)" method="delete" class="text-red-500">Delete</Link>
                </div>
            </div>
        </div>
    </div>
</template>
