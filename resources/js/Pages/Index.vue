<template>

    <Head title="Best Event Center in Nigeria" />
    <div class="min-h-screen py-5 decore">
        <div class="max-w-7xl mx-auto">
            <nav class="flex items-center justify-between mb-8">
                <Link :href="route('login')"
                    class="rounded-md px-3 flex items-center gap-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    <ApplicationLogo class="block h-9 w-auto fill-current text-center" />
                    <span class="font-bold text-2xl">Manooka</span>
                </Link>

                <div>
                    <Link :href="route('login')"
                        class="rounded-md font-bold px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Gallery
                    </Link>

                    <Link v-if="!user" :href="route('login')"
                        class="rounded-md font-bold px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Login
                    </Link>

                    <Link v-if="user" :href="route('dashboard')"
                        class="rounded-md font-bold px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                    </Link>
                </div>
            </nav>

            <div class="main flex items-center" style="min-height: 680px;">
                <div class="lg:w-2/4">
                    <h4 class="font-bold text-xl mb-6 text-light">Best Event Place in Nigeria!</h4>

                    <p class="text-7xl font-black mb-8">
                        Book, relax and enjoy a new and full life.
                    </p>

                    <p class="text-sm mb-6">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque accusamus consequuntur ipsa suscipit modi officiis non molestias repellendus beatae architecto commodi vitae, facilis animi cum? Quibusdam fugiat debitis officia iusto.
                    </p>

                    <div>
                        <button class="py-2 px-5 bg-yellow-900 rounded shadow-sm text-white">Contact us</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);

</script>
