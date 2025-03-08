<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
defineProps({ bug: Object });
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
            <h1 class="text-3xl font-bold">{{ bug.title }}</h1>
            <p class="mt-2">{{ bug.description }}</p>
            <p>Status: <span class="font-semibold">{{ bug.status }}</span></p>
            <p>Project: {{ bug.project.name }}</p>

            <div class="mt-4">
                <Link :href="route('bugs.edit', bug.id)" class="bg-blue-500 text-white px-4 py-2 rounded">Edit</Link>
                <Link :href="route('bugs.index')" class="ml-2 text-gray-600">Back</Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
