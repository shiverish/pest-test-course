<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    courses: Array
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                Welcome to Test-Driven Learning
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <Link
                        v-for="course in courses" :key="course.id"
                        :href="route('course.show', course.id)"
                        class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm hover:shadow-2xl rounded-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 dark:border-gray-700 group block relative"
                    >
                        <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
                        <div class="p-8">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-indigo-50 dark:bg-indigo-900/50 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                    </svg>
                                </div>
                                <span class="text-sm font-bold text-gray-400 bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full">
                                    {{ course.lessons_count }} Lessons
                                </span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-indigo-500 transition-colors">
                                {{ course.title }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 line-clamp-2">
                                {{ course.description }}
                            </p>
                        </div>
                        <div class="px-8 py-4 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-100 dark:border-gray-800 flex items-center justify-between">
                            <span class="text-indigo-600 dark:text-indigo-400 font-semibold group-hover:underline">View Course</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
