<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="rounded-xl border border-white/10 bg-white/5 shadow-inner focus:border-indigo-500 focus:ring focus:ring-indigo-500/20 text-white placeholder-gray-500 transition-all px-4 py-3"
        v-model="model"
        ref="input"
    />
</template>
