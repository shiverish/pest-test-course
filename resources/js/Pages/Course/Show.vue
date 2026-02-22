<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    course: Object,
    userProgress: Array,
});
</script>

<template>
    <Head :title="course.title" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ course.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg tracking-wide p-6 group">
                    <p class="text-gray-600 dark:text-gray-400 mb-8 text-lg">{{ course.description }}</p>

                    <h3 class="text-xl font-bold dark:text-white mb-4">Lessons</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <Link 
                            v-for="(lesson, index) in course.lessons" 
                            :key="lesson.id" 
                            :href="route('lesson.show', lesson.id)"
                            class="block p-6 bg-gray-50 dark:bg-gray-900 rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 hover:bg-gradient-to-br hover:from-indigo-500 hover:to-purple-600 group/card relative overflow-hidden"
                        >
                            <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-white/20 to-white/0 rounded-full blur-2xl group-hover/card:scale-150 transition-transform duration-500"></div>
                            
                            <div class="flex items-center justify-between mb-4 relative z-10">
                                <span class="text-sm font-semibold px-3 py-1 bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 rounded-full group-hover/card:bg-white group-hover/card:text-indigo-600 transition-colors">
                                    Lesson {{ index + 1 }}
                                </span>
                                <svg v-if="userProgress.includes(lesson.id)" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 group-hover/card:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            
                            <h4 class="text-lg font-bold text-gray-900 dark:text-white group-hover/card:text-white relative z-10 mb-2">
                                {{ lesson.title }}
                            </h4>
                            
                            <div class="mt-4 flex items-center text-indigo-600 dark:text-indigo-400 group-hover/card:text-white font-medium text-sm transition-colors relative z-10">
                                Start Learning
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 opacity-0 group-hover/card:opacity-100 transform -translate-x-2 group-hover/card:translate-x-0 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
