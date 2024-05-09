<template>
    <AuthenticatedLayout>

        <Head title="Dashboard" />

        <Modal :show="showModal" v-on:close="toggleModal">
            <div class="p-4">
                <h4 class="text-2xl font-bold">Create Event</h4>
                <p class="text-slate-500 text-sm mb-6">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                </p>

                <div>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis dolorum ex inventore optio unde enim blanditiis odio, repellat quidem asperiores sequi laborum quia, illo voluptates maxime rem ducimus voluptate! Voluptatibus.
                </div>
            </div>
        </Modal>

        <div class="rounded bg-white">
            <div class="relative">
                <div class="overflow-hidden rounded">
                    <div class="h-64">
                        <img src="/images/center.jpg" class="h-100 w-full rounded-l rounded">
                    </div>
                </div>

                <div class="h-24 w-24 rounded-full bg-yellow-600 absolute left-6 flex items-end" style="bottom: -20px; z-index: 9999;">
                    <img src="/images/profile.png" style="width: 100%">
                </div>
            </div>

            <div>
                <div class="p-4 lg:ml-28">
                   <div class="flex items-center justify-between">
                        <div class="text-color">
                            <p class="font-bold text-xl" style="line-height: 10px;">{{ $page.props.auth.user.name }}</p>
                            <small>Agent</small>
                        </div>
                        <button class="py-2 px-5 bg-color rounded-xl text-white" @click="toggleModal()">Create Event</button>
                   </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="md:flex mt-6 gap-4 py-4">
            <div class="basis-3/4">
                <div>
                    <FullCalendar :options="options" />
                </div>
            </div>
            <div class="basis-1/4">
                <div class="rounded bg-white rounded p-3">
                    <h4 class="font-bold mb-4">Recent Events</h4>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque laborum esse praesentium! Nesciunt suscipit nobis, molestias recusandae similique, accusantium, obcaecati modi dicta impedit doloribus perferendis at dolor blanditiis mollitia qui!
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import FullCalendar from '@fullcalendar/vue3';
    import dayGridPlugin from '@fullcalendar/daygrid'
    import interactionPlugin from '@fullcalendar/interaction'
import Modal from '@/Components/Modal.vue';
import { computed, ref } from 'vue';

    const showModal = ref(false);

    const toggleModal = () => {
        showModal.value = !showModal.value;
    }

    computed
    const onDateClick = (date: any) => {
        console.log(date);
    }

    const options = {
        dayHeaders: false,
        dateClick: onDateClick,
        initialView: 'dayGridMonth',
        plugins: [dayGridPlugin, interactionPlugin]
    }

</script>
