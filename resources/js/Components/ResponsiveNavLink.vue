<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-500 text-start text-base font-medium text-indigo-400 bg-indigo-500/10 focus:outline-none focus:text-indigo-300 focus:bg-indigo-500/20 focus:border-indigo-400 transition duration-150 ease-in-out'
        : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-400 hover:text-white hover:bg-white/5 hover:border-gray-600 focus:outline-none focus:text-white focus:bg-white/5 focus:border-gray-600 transition duration-150 ease-in-out',
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
