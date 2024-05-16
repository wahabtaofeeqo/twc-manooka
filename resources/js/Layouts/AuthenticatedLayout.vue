<template>
    <div>
        <div class="min-h-screen bg-gray-100">

            <aside class="hidden lg:block fixed top-0 z-10 left-0 bottom-0 w-60 h-screen" style="background-color: #490057;">

                <!-- Logo -->
                <div class="shrink-0 flex items-center mb-10 p-5 gap-3 text-white justify-center">
                    <Link :href="route('index')" class="flex items-center gap-3 font-bold">
                        <ApplicationLogo
                            class="block h-9 w-auto fill-current text-center"
                        />
                        Manooka
                    </Link>
                </div>

                <div>
                    <div class="text-center text-white flex items-center space-x-4 ms-10 p-2">
                        <i class="fas fa-home opacity-50"></i>
                        <Link :href="route('dashboard')" class="opacity-50"> Dashboard </Link>
                    </div>

                    <div class="text-center text-white flex items-center space-x-4 ms-10 p-2">
                        <i class="fas fa-ticket opacity-50"></i>
                        <Link :href="route('dashboard')" class="opacity-50"> My Events </Link>
                    </div>
                </div>
            </aside>

            <div class="lg:ml-60 h-screen overflow-auto px-4">
                <nav class="py-4">

                    <!-- Primary Navigation Menu -->
                    <div class="">
                        <div class="flex gap-3 items-center">

                            <div class="flex-1">
                                <TextInput
                                    type="search"
                                    placeholder="Search..."
                                    class="block w-full flex-1 h-14 border-white"
                                    v-model="searchTerm"
                                />
                            </div>

                            <div class="hidden sm:flex sm:items-center sm:ms-6">
                                <!-- Settings Dropdown -->
                                <div class="ms-3 relative flex gap-5 items-center">
                                    <div class="text-color">
                                        <p class="font-bold" style="line-height: 10px;">{{ $page.props.auth?.user?.name }}</p>
                                        <Link class="text-sm" :href="route('logout')" method="post" as="button">
                                            Logout
                                        </Link>
                                    </div>

                                    <div class="h-12 w-12 rounded-full bg-yellow-500 flex items-center justify-center">
                                        <ApplicationLogo class="w-10 h-10" />
                                    </div>
                                </div>
                            </div>

                            <!-- Hamburger -->
                            <div class="-me-2 flex items-center sm:hidden">
                                <button
                                    @click="showingNavigationDropdown = !showingNavigationDropdown"
                                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                >
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path
                                            :class="{
                                                hidden: showingNavigationDropdown,
                                                'inline-flex': !showingNavigationDropdown,
                                            }"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"
                                        />
                                        <path
                                            :class="{
                                                hidden: !showingNavigationDropdown,
                                                'inline-flex': showingNavigationDropdown,
                                            }"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Responsive Navigation Menu -->
                    <div
                        :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                        class="sm:hidden">
                        <div class="pt-2 pb-3 space-y-1">
                            <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                Dashboard
                            </ResponsiveNavLink>
                        </div>

                        <!-- Responsive Settings Options -->
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="px-4">
                                <div class="font-medium text-base text-gray-800">
                                    {{ $page.props.auth.user.name }}
                                </div>
                                <div class="font-medium text-sm text-gray-500">{{ $page.props.auth?.user?.email }}</div>
                            </div>

                            <div class="mt-3 space-y-1">
                                <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                                <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                    Log Out
                                </ResponsiveNavLink>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Page Heading -->
                <header class="bg-white shadow" v-if="$slots.header">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <slot name="header" />
                    </div>
                </header>

                <!-- Page Content -->
                <main>
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
    import { ref } from 'vue';
    import ApplicationLogo from '@/Components/ApplicationLogo.vue';
    import Dropdown from '@/Components/Dropdown.vue';
    import DropdownLink from '@/Components/DropdownLink.vue';
    import NavLink from '@/Components/NavLink.vue';
    import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
    import { Link } from '@inertiajs/vue3';
    import TextInput from '@/Components/TextInput.vue';

    const showingNavigationDropdown = ref(false);

    const searchTerm = ref("");

</script>

