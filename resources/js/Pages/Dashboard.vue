<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <a :href="feedsIndexLink">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-2 py-3 text-center uppercase">
                    feeds
                    <welcome v-if="false" />
                </div>
                </a>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
        props:{
            feedsIndexLink:String
        }
    }
</script>
