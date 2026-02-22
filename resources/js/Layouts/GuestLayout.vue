<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-[#0a0a0a] text-white pt-6 sm:justify-center sm:pt-0 selection:bg-indigo-500 selection:text-white"
    >
        <!-- Animated Background Elements -->
        <div class="fixed inset-0 z-0 pointer-events-none">
            <div class="absolute top-[0%] left-[10%] w-[30%] h-[30%] rounded-full bg-indigo-900/10 blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-[10%] right-[10%] w-[40%] h-[40%] rounded-full bg-purple-900/10 blur-[150px] animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-gray-900/40 via-[#0a0a0a] to-[#0a0a0a]"></div>
        </div>

        <div class="relative z-10 lg:scale-[1.2] mb-4">
            <Link href="/" class="flex items-center gap-3 group cursor-pointer cursor-pointer hover:scale-105 transition-transform duration-300">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-bold text-2xl shadow-[0_0_20px_rgba(99,102,241,0.4)]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <span class="text-3xl font-bold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-white to-gray-400">Pest<span class="text-indigo-400">Mastery</span></span>
            </Link>
        </div>

        <div
            class="mt-6 w-full overflow-hidden bg-[#0d1117]/80 border border-white/10 backdrop-blur-xl shadow-[0_0_40px_rgba(0,0,0,0.5)] px-6 py-8 sm:max-w-md sm:rounded-2xl relative z-10"
        >
            <slot />
        </div>
    </div>
</template>
