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
                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <InputLabel for="email" value="Event Name" />
                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                                autofocus
                            />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div class="mb-4">
                            <InputLabel for="email" value="Event Date" />
                            <TextInput
                                id="date"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.date"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.date" />
                        </div>

                        <div class="mb-4">
                            <InputLabel for="description" value="Event Details" />
                            <textarea
                                rows="5"
                                placeholder="Brief info..."
                                class="mt-1 block w-full"
                                v-model="form.description"
                            ></textarea>
                        </div>

                        <h4 class="font-bold mb-2">Client Information</h4>
                        <div class="mb-4">
                            <InputLabel for="clientName" value="Client Name" />
                            <TextInput
                                id="client_name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.client_name"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.client_name" />
                        </div>

                        <div class="mb-4">
                            <InputLabel for="clientPhone" value="Client Phone" />
                            <TextInput
                                id="client_phone"
                                type="tel"
                                class="mt-1 block w-full"
                                v-model="form.client_phone"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.client_phone" />
                        </div>


                        <div class="mt-6 text-end">
                            <PrimaryButton class="bg-color text-white px-14 py-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Create
                            </PrimaryButton>
                        </div>
                    </form>
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

                <div class="h-24 w-24 rounded-full bg-yellow-600 absolute left-6 flex items-end" style="bottom: -20px;">
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
                    <div v-for="event in events">
                        <div class="flex justify-between items-center py-3 border-b">
                            <h4 class="font-bold">{{ event.name }}</h4>
                            <p>{{ moment(event.created_at).format("MMM Do YY") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, useForm, usePage } from '@inertiajs/vue3';
    import FullCalendar from '@fullcalendar/vue3';
    import dayGridPlugin from '@fullcalendar/daygrid'
    import interactionPlugin from '@fullcalendar/interaction'
    import Modal from '@/Components/Modal.vue';
    import { computed, ref } from 'vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import InputError from '@/Components/InputError.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
import moment from 'moment';

    defineProps<{
        events: any[];
        status?: string;
    }>();

    const page = usePage();
    const showModal = ref(false);

    const toggleModal = () => {
        showModal.value = !showModal.value;
    }

    const onDateClick = (date: any) => {
        console.log(date);
    }

    const options = {
        dayHeaders: false,
        dateClick: onDateClick,
        initialView: 'dayGridMonth',
        plugins: [dayGridPlugin, interactionPlugin]
    }

    const form = useForm({
        name: '',
        date: '',
        client_name: '',
        client_phone: '',
        description: '',
    });

    const events: any = computed(() => page.props.events);

    const submit = () => {
        form.post(route('event.store'), {
            onFinish: () => {
                form.reset();
                showModal.value = false
            },
        });
    };

</script>
