<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    courses: Array,
    userProgress: Array
});

const activeTab = ref('beginner');
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
                                <div class="shrink-0" v-if="course.lessons.length > 0">
                                    <Link :href="route('lesson.show', course.lessons[0].id)" class="px-8 py-4 bg-white/5 border border-white/10 rounded-xl flex items-center gap-3 hover:bg-white/10 transition-colors group">
                                        <span class="text-white font-semibold group-hover:text-indigo-300 transition-colors">Start Learning Journey</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400 transform group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </Link>
                                </div>
                            </div>

                            <!-- Tabs Navigation -->
                            <div class="flex gap-4 mb-8 border-b border-white/10 pb-4">
                                <button 
                                    @click="activeTab = 'beginner'"
                                    :class="[
                                        'px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center gap-2',
                                        activeTab === 'beginner' 
                                            ? 'bg-indigo-500/20 text-indigo-400 border border-indigo-500/30 shadow-[0_0_20px_rgba(99,102,241,0.2)]' 
                                            : 'bg-white/5 text-gray-400 border border-transparent hover:bg-white/10 hover:text-gray-300'
                                    ]"
                                >
                                    Beginner Fundamentals
                                    <span class="text-sm bg-black/30 rounded-full px-2.5 py-0.5 ml-1 font-medium">
                                        {{ course.lessons.filter(l => l.section === 'beginner' && userProgress.includes(l.id)).length }}/{{ course.lessons.filter(l => l.section === 'beginner').length }}
                                    </span>
                                </button>
                                <button 
                                    @click="activeTab = 'intermediate'"
                                    :class="[
                                        'px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center gap-2',
                                        activeTab === 'intermediate' 
                                            ? 'bg-purple-500/20 text-purple-400 border border-purple-500/30 shadow-[0_0_20px_rgba(168,85,247,0.2)]' 
                                            : 'bg-white/5 text-gray-400 border border-transparent hover:bg-white/10 hover:text-gray-300'
                                    ]"
                                >
                                    Intermediate Techniques
                                    <span class="text-sm bg-black/30 rounded-full px-2.5 py-0.5 ml-1 font-medium">
                                        {{ course.lessons.filter(l => l.section === 'intermediate' && userProgress.includes(l.id)).length }}/{{ course.lessons.filter(l => l.section === 'intermediate').length }}
                                    </span>
                                </button>
                                <button 
                                    @click="activeTab = 'advanced'"
                                    :class="[
                                        'px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center gap-2',
                                        activeTab === 'advanced' 
                                            ? 'bg-rose-500/20 text-rose-400 border border-rose-500/30 shadow-[0_0_20px_rgba(244,63,94,0.2)]' 
                                            : 'bg-white/5 text-gray-400 border border-transparent hover:bg-white/10 hover:text-gray-300'
                                    ]"
                                >
                                    Advanced Controllers
                                    <span class="text-sm bg-black/30 rounded-full px-2.5 py-0.5 ml-1 font-medium">
                                        {{ course.lessons.filter(l => l.section === 'advanced' && userProgress.includes(l.id)).length }}/{{ course.lessons.filter(l => l.section === 'advanced').length }}
                                    </span>
                                </button>
                            </div>

                            <!-- Lessons List -->
                            <div class="flex flex-col gap-3">
                                <Link 
                                    v-for="(lesson, index) in course.lessons.filter(l => l.section === activeTab)" 
                                    :key="lesson.id" 
                                    :href="route('lesson.show', lesson.id)"
                                    class="group flex items-center p-4 rounded-xl bg-white/[0.02] border border-white/5 hover:bg-white/5 hover:border-white/20 transition-all duration-300"
                                >
                                    <div class="w-10 h-10 shrink-0 rounded-lg bg-black/40 border border-white/10 flex items-center justify-center mr-6 group-hover:bg-white/10 transition-colors">
                                        <span class="font-bold text-gray-400 group-hover:text-white transition-colors">
                                            {{ lesson.section === 'beginner' ? index + 1 : (lesson.section === 'intermediate' ? index + 16 : index + 31) }}
                                        </span>
                                    </div>
                                    
                                    <h4 class="flex-grow text-lg font-medium text-gray-300 group-hover:text-white transition-colors">
                                        {{ lesson.title.split(': ').length > 1 ? lesson.title.split(': ')[1] : lesson.title }}
                                    </h4>

                                    <div class="flex items-center gap-6">
                                        <div class="flex items-center text-sm font-semibold opacity-0 -translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300"
                                             :class="activeTab === 'beginner' ? 'text-indigo-400' : (activeTab === 'intermediate' ? 'text-purple-400' : 'text-rose-400')"
                                        >
                                            <span class="mr-2">Play Lesson</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                            </svg>
                                        </div>

                                        <!-- Status Indicator -->
                                        <div v-if="userProgress.includes(lesson.id)" 
                                             class="w-8 h-8 rounded-full bg-green-500/20 border border-green-500/30 flex items-center justify-center shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <div v-else class="w-8 h-8 rounded-full border border-white/10 flex items-center justify-center shrink-0 group-hover:border-white/30 transition-colors">
                                            <div class="w-2 h-2 rounded-full bg-white/20 group-hover:bg-white/40 transition-colors"></div>
                                        </div>
                                    </div>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
