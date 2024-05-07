<script setup lang="ts">
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
</script>

<template>
    <AuthenticatedLayout>
        <div class="rounded h-96 bg-white">
            <div class="h-64 overflow-hidden">
                <img src="/images/cover.jpg" alt="" srcset="" class="h-100 w-full rounded-l rounded-r">
            </div>
            <div class="p-4">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio suscipit sequi quibusdam inventore repellat facere obcaecati porro nemo numquam odit eveniet nam nobis quos enim ipsam, excepturi minima dolore minus!
            </div>
        </div>
    </AuthenticatedLayout>
</template>
