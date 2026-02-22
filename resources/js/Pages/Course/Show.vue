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
            <h2 class="font-semibold text-2xl text-white leading-tight">
                {{ course.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-transparent overflow-hidden tracking-wide p-6 group">
                    <p class="text-gray-400 mb-8 text-lg">{{ course.description }}</p>

                    <!-- Beginner Section -->
                    <div v-if="course.lessons.filter(l => l.section === 'beginner').length > 0" class="mb-12">
                        <h3 class="text-2xl font-bold text-white mb-6 border-b border-white/10 pb-2">Beginner Fundamentals</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <Link 
                                v-for="(lesson, index) in course.lessons.filter(l => l.section === 'beginner')" 
                                :key="lesson.id" 
                                :href="route('lesson.show', lesson.id)"
                                class="block p-6 bg-white/5 border border-white/10 rounded-2xl shadow-lg hover:shadow-[0_0_30px_rgba(99,102,241,0.2)] transition-all duration-300 transform hover:-translate-y-1 hover:bg-gradient-to-br hover:from-indigo-500 hover:to-purple-600 hover:border-transparent group/card relative overflow-hidden"
                            >
                                <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-white/20 to-white/0 rounded-full blur-2xl group-hover/card:scale-150 transition-transform duration-500"></div>
                                
                                <div class="flex items-center justify-between mb-4 relative z-10">
                                    <span class="text-sm font-semibold px-3 py-1 bg-white/10 border border-white/20 text-indigo-300 rounded-full group-hover/card:bg-white/20 group-hover/card:text-white group-hover/card:border-transparent transition-colors">
                                        Lesson {{ index + 1 }}
                                    </span>
                                    <svg v-if="userProgress.includes(lesson.id)" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400 group-hover/card:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                
                                <h4 class="text-lg font-bold text-white relative z-10 mb-2">
                                    {{ lesson.title }}
                                </h4>
                                
                                <div class="mt-4 flex items-center text-indigo-400 group-hover/card:text-white font-medium text-sm transition-colors relative z-10">
                                    Start Learning
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 opacity-0 group-hover/card:opacity-100 transform -translate-x-2 group-hover/card:translate-x-0 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </div>
                            </Link>
                        </div>
                    </div>

                    <!-- Intermediate Section -->
                    <div v-if="course.lessons.filter(l => l.section === 'intermediate').length > 0">
                        <h3 class="text-2xl font-bold text-white mb-6 border-b border-purple-500/30 pb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Intermediate Techniques
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <Link 
                                v-for="(lesson, index) in course.lessons.filter(l => l.section === 'intermediate')" 
                                :key="lesson.id" 
                                :href="route('lesson.show', lesson.id)"
                                class="block p-6 bg-white/5 border border-purple-500/20 rounded-2xl shadow-lg hover:shadow-[0_0_30px_rgba(168,85,247,0.2)] transition-all duration-300 transform hover:-translate-y-1 hover:bg-gradient-to-br hover:from-purple-600 hover:to-pink-600 hover:border-transparent group/card relative overflow-hidden"
                            >
                                <!-- Abstract decorative background blob -->
                                <div class="absolute -right-6 -top-6 w-32 h-32 bg-gradient-to-br from-purple-400/20 to-pink-400/0 rounded-full blur-2xl group-hover/card:scale-150 transition-transform duration-500"></div>
                                
                                <div class="flex items-center justify-between mb-4 relative z-10">
                                    <span class="text-sm font-semibold px-3 py-1 bg-purple-500/10 border border-purple-500/20 text-purple-300 rounded-full group-hover/card:bg-white/20 group-hover/card:text-white group-hover/card:border-transparent transition-colors">
                                        Lesson {{ index + 16 }}
                                    </span>
                                    <svg v-if="userProgress.includes(lesson.id)" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400 group-hover/card:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                
                                <h4 class="text-lg font-bold text-white relative z-10 mb-2">
                                    {{ lesson.title }}
                                </h4>
                                
                                <div class="mt-4 flex items-center text-purple-400 group-hover/card:text-white font-medium text-sm transition-colors relative z-10">
                                    Master Topic
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 opacity-0 group-hover/card:opacity-100 transform -translate-x-2 group-hover/card:translate-x-0 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </div>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
