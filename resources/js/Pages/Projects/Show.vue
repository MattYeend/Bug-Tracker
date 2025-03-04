<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({ project: Object });
</script>

<template>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold">{{ project.name }}</h1>
        <p class="mt-2">{{ project.description }}</p>
        <p class="mt-2">Status: <span class="font-semibold">{{ project.status }}</span></p>
        
        <div class="mt-4">
            <Link :href="route('projects.edit', project.id)" class="bg-blue-500 text-white px-4 py-2 rounded">Edit</Link>
            <Link :href="route('projects.index')" class="ml-2 text-gray-600">Back</Link>
        </div>
    </div>
</template>
