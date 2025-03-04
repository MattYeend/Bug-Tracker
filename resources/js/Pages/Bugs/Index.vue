<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({ bugs: Array });
</script>

<template>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Bugs</h1>
        <Link :href="route('bugs.create')" class="bg-blue-500 text-white px-4 py-2 rounded">New Bug</Link>
        <div class="mt-4 grid gap-4">
            <div v-for="bug in bugs" :key="bug.id" class="p-4 border rounded shadow">
                <h2 class="text-xl font-bold">{{ bug.title }}</h2>
                <p>{{ bug.description }}</p>
                <p>Status: <span class="font-semibold">{{ bug.status }}</span></p>
                <p>Project: {{ bug.project.name }}</p>
                <div class="mt-2 space-x-2">
                    <Link :href="route('bugs.show', bug.id)" class="text-green-500">View</Link>
                    <Link :href="route('bugs.edit', bug.id)" class="text-blue-500">Edit</Link>
                    <Link :href="route('bugs.destroy', bug.id)" method="delete" class="text-red-500">Delete</Link>
                </div>
            </div>
        </div>
    </div>
</template>
