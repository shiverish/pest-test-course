<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Test-Driven Learning" />
    <div class="min-h-screen bg-[#0a0a0a] text-white overflow-hidden selection:bg-indigo-500 selection:text-white">
        
        <!-- Animated Background Elements -->
        <div class="fixed inset-0 z-0 pointer-events-none">
            <!-- Simplified, less aggressive glows -->
            <div class="absolute top-[0%] left-[10%] w-[30%] h-[30%] rounded-full bg-indigo-900/10 blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-[10%] right-[10%] w-[40%] h-[40%] rounded-full bg-purple-900/10 blur-[150px] animate-pulse" style="animation-delay: 2s;"></div>
            
            <!-- Replaced loud SVG with a subtle radial gradient -->
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-gray-900/40 via-[#0a0a0a] to-[#0a0a0a]"></div>
        </div>

        <!-- Navigation -->
        <nav class="relative z-50 px-6 py-6 w-full max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3 group cursor-pointer">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-bold text-xl shadow-[0_0_15px_rgba(99,102,241,0.3)] group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-white to-gray-400">Pest<span class="text-indigo-400">Mastery</span></span>
            </div>

            <div v-if="canLogin" class="flex gap-4 items-center">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="px-5 py-2 rounded-full bg-white/5 hover:bg-white/10 border border-white/10 text-sm font-semibold backdrop-blur-md transition-all hover:scale-105"
                >
                    Dashboard
                </Link>

                <template v-else>
                    <Link
                        :href="route('login')"
                        class="px-4 py-2 text-sm font-semibold text-gray-300 hover:text-white transition-colors hidden sm:block"
                    >
                        Log in
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="px-5 py-2 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-400 hover:to-purple-500 text-sm font-bold shadow-[0_0_15px_rgba(99,102,241,0.3)] hover:shadow-[0_0_25px_rgba(99,102,241,0.5)] text-white transition-all transform hover:-translate-y-0.5"
                    >
                        Get Started
                    </Link>
                </template>
            </div>
        </nav>

        <!-- Hero Section -->
        <main class="relative z-10 max-w-7xl mx-auto px-6 pt-24 pb-32 flex flex-col items-center text-center origin-center">
            
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-sm mb-8 animate-fade-in-up">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span class="text-xs font-semibold text-gray-300 tracking-wider uppercase">Interactive Pest PHP Course</span>
            </div>

            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black tracking-tighter mb-8 leading-[1.1]">
                Master <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500">Laravel Testing</span><br/>
                Through Practice
            </h1>

            <p class="text-lg md:text-xl text-gray-400 max-w-3xl mb-12 leading-relaxed">
                Ditch the boring video tutorials. Dive into a hands-on, interactive code environment where you write real unit tests, learn Pest's elegant syntax, and level up your engineering career.
            </p>

            <div class="flex flex-col sm:flex-row gap-4">
                <Link
                    :href="route('register')"
                    class="group relative inline-flex items-center justify-center px-8 py-3 font-bold text-white transition-all duration-200 bg-indigo-600 font-pj rounded-xl overflow-hidden shadow-[0_0_20px_rgba(79,70,229,0.3)] hover:shadow-[0_0_40px_rgba(79,70,229,0.5)] hover:-translate-y-0.5"
                >
                    <div class="absolute inset-0 w-full h-full -mt-1 rounded-lg opacity-30 bg-gradient-to-b from-transparent via-transparent to-black"></div>
                    <span class="relative flex items-center gap-2 text-md">
                        Start Coding Now
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </span>
                </Link>

                <a
                    href="#features"
                    class="inline-flex items-center justify-center px-8 py-3 font-bold text-white transition-all duration-200 bg-white/5 border border-white/10 rounded-xl hover:bg-white/10 backdrop-blur-md text-md"
                >
                    View Curriculum
                </a>
            </div>

            <!-- Faux Editor Preview -->
            <div class="mt-24 w-full max-w-5xl rounded-2xl overflow-hidden border border-white/10 bg-[#0d1117] shadow-2xl relative group">
                <div class="absolute inset-0 bg-gradient-to-t from-[#0d1117] via-transparent to-transparent z-10"></div>
                <!-- Editor Header -->
                <div class="flex items-center justify-between px-4 py-3 bg-[#161b22] border-b border-[#30363d]">
                    <div class="flex gap-2">
                        <div class="w-3 h-3 rounded-full bg-red-500 border border-red-600"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500 border border-yellow-600"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500 border border-green-600"></div>
                    </div>
                    <div class="text-[#8b949e] text-xs font-mono">tests/Unit/ExampleTest.php</div>
                    <div></div>
                </div>
                <!-- Editor Body -->
                <div class="p-6 text-left font-mono text-sm leading-relaxed overflow-hidden relative">
                    <div class="absolute left-0 top-0 bottom-0 w-12 bg-[#161b22]/50 border-r border-[#30363d] flex flex-col items-center pt-6 text-[#8b949e] opacity-50">
                        <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span>
                    </div>
                    <div class="pl-10">
                        <div class="text-[#c9d1d9]"><span class="text-[#ff7b72]">test</span>(<span class="text-[#a5d6ff]">'interactive assertions'</span>, <span class="text-[#ff7b72]">function</span> () {</div>
                        <div class="pl-8 text-[#8b949e] italic">// Write your expectation...</div>
                        <div class="pl-8">
                            <span class="text-[#d2a8ff]">expect</span>(<span class="text-[#a5d6ff]">true</span>)<span class="text-[#c9d1d9]">-&gt;</span><span class="text-[#d2a8ff]">toBeTrue</span>();
                        </div>
                        <div class="text-[#c9d1d9]">});</div>
                    </div>
                </div>
                <!-- Success Banner Overlay -->
                <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-[#2ea043]/30 bg-[#2ea043]/10 backdrop-blur-sm z-20 flex justify-center items-center gap-3 transform translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                    <div class="w-6 h-6 rounded-full bg-[#2ea043] flex items-center justify-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    </div>
                    <span class="text-[#3fb950] font-mono text-sm font-bold">PASS  Tests\Unit\ExampleTest</span>
                </div>
            </div>
            
        </main>

        <!-- Features Section -->
        <section id="features" class="relative z-10 bg-black/40 border-y border-white/5 py-24">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-5xl font-bold mb-4">Why learn with <span class="text-indigo-400">PestMastery?</span></h2>
                    <p class="text-gray-400 text-lg max-w-2xl mx-auto">We've stripped away the noise so you can focus strictly on leveling up your coding muscle memory.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="p-8 rounded-3xl bg-white/5 border border-white/10 hover:bg-white/10 transition-colors">
                        <div class="w-14 h-14 rounded-2xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Interactive Editor</h3>
                        <p class="text-gray-400">Your browser becomes your IDE. Write raw Pest assertions and instantly see validation responses without booting up Docker.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="p-8 rounded-3xl bg-white/5 border border-white/10 hover:bg-white/10 transition-colors">
                        <div class="w-14 h-14 rounded-2xl bg-purple-500/20 text-purple-400 flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Pest PHP Focus</h3>
                        <p class="text-gray-400">Tailored completely towards the fastest growing PHP testing framework created by Nuno Maduro. Learn `expect()` syntax fluently.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="p-8 rounded-3xl bg-white/5 border border-white/10 hover:bg-white/10 transition-colors">
                        <div class="w-14 h-14 rounded-2xl bg-pink-500/20 text-pink-400 flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Progress Tracking</h3>
                        <p class="text-gray-400">Your dashboard saves your state automatically. Complete lessons to earn checkmarks and visually track your growth into a senior test-driven engineer.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="relative z-10 bg-black/80 py-12 text-center text-sm text-gray-500 border-t border-white/5">
            <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-2 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                    <span class="text-white">PestMastery</span>
                </div>
                
                <div class="flex gap-6 text-gray-400">
                    <a href="#" class="hover:text-white transition-colors">Curriculum</a>
                    <a href="#" class="hover:text-white transition-colors">Pricing</a>
                    <a href="#" class="hover:text-white transition-colors">Methodology</a>
                    <a href="#" class="hover:text-white transition-colors">Sign Code</a>
                </div>

                <div class="flex items-center gap-4 text-xs">
                    <span class="px-2 py-1 bg-white/5 border border-white/10 rounded-md">Laravel v{{ laravelVersion }}</span>
                    <span class="px-2 py-1 bg-white/5 border border-white/10 rounded-md">PHP v{{ phpVersion }}</span>
                </div>
            </div>
        </footer>
    </div>
</template>

<style>
/* Animations setup */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
}
</style>
