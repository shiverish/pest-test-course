<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

const props = defineProps({
    lesson: Object,
    isCompleted: Boolean,
    nextLesson: Object
});

const form = useForm({
    code: props.lesson.starter_test_code
});

const submitTest = () => {
    form.post(route('lesson.submit', props.lesson.id), {
        preserveScroll: true
    });
};
</script>

<template>
    <Head :title="lesson.title" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-white leading-tight">
                    <Link :href="route('dashboard')" class="text-indigo-400 hover:text-indigo-300 mr-2">
                        &larr; Dashboard
                    </Link>
                    / {{ lesson.title }}
                </h2>
                <div v-if="isCompleted" class="px-4 py-1.5 bg-green-500/10 border border-green-500/30 text-green-400 rounded-full font-bold text-sm tracking-wide flex items-center shadow-[0_0_15px_rgba(34,197,94,0.3)]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    PASSED
                </div>
            </div>
        </template>

        <div class="py-8 h-[calc(100vh-140px)] flex flex-col">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 w-full flex-grow flex flex-col lg:flex-row gap-6 h-full">
                
                <!-- Left panel: Instructions -->
                <div class="w-full lg:w-1/3 flex flex-col bg-[#0d1117] shadow-xl rounded-2xl overflow-hidden border border-white/10 backdrop-blur-md">
                    <div class="p-6 bg-white/5 border-b border-white/10 flex items-center">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold mr-3 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Instructions</h3>
                    </div>
                    <div class="p-6 flex-grow overflow-y-auto prose dark:prose-invert relative">
                        <p class="text-gray-300 leading-relaxed text-lg mb-8">{{ lesson.content }}</p>
                        
                        <div v-if="lesson.hint" class="mt-8 bg-amber-900/20 border border-amber-700/50 rounded-xl p-5 shadow-sm">
                            <h4 class="text-amber-400 font-bold flex items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                                Hint
                            </h4>
                            <p class="text-amber-300/80 m-0 text-md">{{ lesson.hint }}</p>
                        </div>
                    </div>
                </div>

                <!-- Right panel: Editor & Output -->
                <div class="w-full lg:w-2/3 flex flex-col gap-6 h-full">
                    <!-- Editor -->
                    <div class="flex-grow flex flex-col bg-[#1e1e1e] rounded-2xl shadow-2xl overflow-hidden border border-white/10 relative">
                        <div class="flex items-center px-4 py-3 bg-[#252526] border-b border-white/10">
                            <div class="flex gap-2 mr-4">
                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                            </div>
                            <span class="text-gray-400 text-sm font-mono flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                                ExampleTest.php
                            </span>
                        </div>
                        <textarea 
                            v-model="form.code" 
                            class="flex-grow w-full bg-[#1e1e1e] text-[#d4d4d4] p-6 font-mono text-base resize-none focus:ring-0 focus:outline-none border-none leading-relaxed tracking-wide"
                            spellcheck="false"
                        ></textarea>
                        
                        <div class="absolute bottom-6 right-6">
                            <button 
                                @click="submitTest" 
                                :disabled="form.processing"
                                class="flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl shadow-[0_0_20px_rgba(79,70,229,0.5)] hover:shadow-[0_0_30px_rgba(79,70,229,0.7)] transition-all transform hover:-translate-y-1 disabled:opacity-50"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Run Test
                            </button>
                        </div>
                    </div>

                    <!-- Output Terminal -->
                    <div class="h-48 bg-[#0d1117] rounded-2xl shadow-inner overflow-hidden border border-white/10 flex flex-col relative group">
                        <div class="px-4 py-2 bg-[#161b22] border-b border-white/10 flex items-center">
                            <span class="text-[#8b949e] text-xs font-mono uppercase tracking-widest">Terminal Output</span>
                        </div>
                        <div class="p-4 overflow-y-auto font-mono text-sm flex-grow">
                            <div v-if="form.processing" class="text-blue-400 animate-pulse">Running pest --filter ExampleTest...</div>
                            <div v-else-if="$page.props.flash?.success" class="text-green-400 leading-loose">
                                <p>PASS Tests\Unit\ExampleTest</p>
                                <p>✓ function ({{ lesson.title }})</p>
                                <br/>
                                <p class="font-bold">Tests:  1 passed</p>
                                <p>{{ $page.props.flash.success }}</p>
                            </div>
                            <div v-else-if="$page.props.flash?.error" class="text-red-400 leading-loose">
                                <p>FAIL Tests\Unit\ExampleTest</p>
                                <p>✕ function ({{ lesson.title }})</p>
                                <br/>
                                <p class="font-bold">{{ $page.props.flash.error }}</p>
                            </div>
                            <div v-else class="text-[#8b949e]">Waiting for code execution...</div>
                        </div>
                    </div>

                    <!-- Next Lesson Action -->
                    <div v-if="isCompleted && nextLesson" class="flex justify-end mt-2 shrink-0">
                        <Link :href="route('lesson.show', nextLesson.id)" class="flex items-center px-6 py-3 bg-green-600 hover:bg-green-500 text-white font-bold rounded-xl shadow-[0_0_20px_rgba(22,163,74,0.4)] hover:shadow-[0_0_30px_rgba(22,163,74,0.6)] transition-all transform hover:-translate-y-1">
                            Next Lesson: {{ nextLesson.title }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 border border-white rounded-full bg-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </Link>
                    </div>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
