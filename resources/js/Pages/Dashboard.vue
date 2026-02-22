<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    courses: Array,
    userProgress: Array
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-2xl text-white leading-tight">
                Welcome to Test-Driven Learning
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col gap-12">
                    <div
                        v-for="course in courses" :key="course.id"
                        class="bg-[#0d1117] overflow-hidden shadow-2xl rounded-3xl border border-white/5 relative"
                    >
                        <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
                        <div class="p-8 md:p-12">
                            <!-- Course Header -->
                            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-10 pb-10 border-b border-white/10 gap-6">
                                <div class="flex-1">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div class="p-3 bg-indigo-500/10 border border-indigo-500/20 rounded-xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                            </svg>
                                        </div>
                                        <span class="text-sm font-bold text-gray-300 bg-white/5 border border-white/10 px-4 py-1.5 rounded-full inline-flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                            {{ course.lessons_count }} Lessons Total
                                        </span>
                                    </div>
                                    
                                    <h3 class="text-3xl font-bold text-white mb-3">
                                        {{ course.title }}
                                    </h3>
        
                                    <p class="text-gray-400 text-lg max-w-3xl">
                                        {{ course.description }}
                                    </p>
                                </div>
                                <div class="shrink-0">
                                    <Link :href="route('course.show', course.id)" class="px-8 py-4 bg-white/5 border border-white/10 rounded-xl flex items-center gap-3 hover:bg-white/10 transition-colors group">
                                        <span class="text-white font-semibold group-hover:text-indigo-300 transition-colors">Start Learning Journey</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400 transform group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </Link>
                                </div>
                            </div>

                            <!-- Lesson Sections Grouping -->
                            <div class="flex flex-col gap-12">
                                <!-- Beginner Row -->
                                <div v-if="course.lessons.filter(l => l.section === 'beginner').length > 0">
                                    <div class="flex items-center gap-3 mb-6">
                                        <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-500/20 text-indigo-400 font-bold border border-indigo-500/30">1</span>
                                        <h4 class="text-2xl font-bold text-white">Beginner Fundamentals</h4>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                                        <Link 
                                            v-for="(lesson, index) in course.lessons.filter(l => l.section === 'beginner')" 
                                            :key="lesson.id" 
                                            :href="route('lesson.show', lesson.id)"
                                            class="flex flex-col p-5 rounded-2xl bg-white/[0.03] border border-white/5 hover:bg-white/5 hover:border-indigo-500/30 hover:shadow-[0_8px_30px_rgba(99,102,241,0.1)] transition-all group/block relative overflow-hidden h-full"
                                        >
                                            <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-transparent opacity-0 group-hover/block:opacity-100 transition-opacity"></div>
                                            
                                            <div class="flex items-start justify-between mb-4 relative z-10 w-full">
                                                <span class="text-xs font-bold px-2.5 py-1 bg-black/40 border border-white/5 text-gray-300 rounded-lg group-hover/block:text-indigo-300 group-hover/block:border-indigo-500/20 transition-colors">
                                                    Lesson {{ index + 1 }}
                                                </span>
                                                
                                                <div v-if="userProgress.includes(lesson.id)" class="w-6 h-6 rounded-full bg-green-500/20 border border-green-500/30 flex items-center justify-center shrink-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <div v-else class="w-6 h-6 rounded-full border border-white/10 flex items-center justify-center shrink-0 group-hover/block:border-indigo-400/50 transition-colors">
                                                    <div class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover/block:bg-indigo-400/50 transition-colors"></div>
                                                </div>
                                            </div>

                                            <h5 class="font-semibold text-gray-200 text-sm group-hover/block:text-white transition-colors relative z-10">
                                                {{ lesson.title.split(': ').length > 1 ? lesson.title.split(': ')[1] : lesson.title }}
                                            </h5>
                                        </Link>
                                    </div>
                                </div>

                                <!-- Intermediate Row -->
                                <div v-if="course.lessons.filter(l => l.section === 'intermediate').length > 0">
                                    <div class="flex items-center gap-3 mb-6">
                                        <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-purple-500/20 text-purple-400 font-bold border border-purple-500/30">2</span>
                                        <h4 class="text-2xl font-bold text-white">Intermediate Techniques</h4>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                                        <Link 
                                            v-for="(lesson, index) in course.lessons.filter(l => l.section === 'intermediate')" 
                                            :key="lesson.id" 
                                            :href="route('lesson.show', lesson.id)"
                                            class="flex flex-col p-5 rounded-2xl bg-white/[0.03] border border-white/5 hover:bg-white/5 hover:border-purple-500/30 hover:shadow-[0_8px_30px_rgba(168,85,247,0.1)] transition-all group/block relative overflow-hidden h-full"
                                        >
                                            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-transparent opacity-0 group-hover/block:opacity-100 transition-opacity"></div>
                                            
                                            <div class="flex items-start justify-between mb-4 relative z-10 w-full">
                                                <span class="text-xs font-bold px-2.5 py-1 bg-black/40 border border-white/5 text-gray-300 rounded-lg group-hover/block:text-purple-300 group-hover/block:border-purple-500/20 transition-colors">
                                                    Lesson {{ index + 16 }}
                                                </span>
                                                
                                                <div v-if="userProgress.includes(lesson.id)" class="w-6 h-6 rounded-full bg-green-500/20 border border-green-500/30 flex items-center justify-center shrink-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <div v-else class="w-6 h-6 rounded-full border border-white/10 flex items-center justify-center shrink-0 group-hover/block:border-purple-400/50 transition-colors">
                                                    <div class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover/block:bg-purple-400/50 transition-colors"></div>
                                                </div>
                                            </div>

                                            <h5 class="font-semibold text-gray-200 text-sm group-hover/block:text-white transition-colors relative z-10">
                                                {{ lesson.title.split(': ').length > 1 ? lesson.title.split(': ')[1] : lesson.title }}
                                            </h5>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
