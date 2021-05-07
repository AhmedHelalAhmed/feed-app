<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Feeds
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <a v-for="(feed, key) in feeds" :href="feed.link" target="_blank">
                    <div class="border p-3 bg-white hover:bg-gray-200">
                        <span class="font-bold">{{key+1}}-</span> <span class="text-blue-600">{{ feed.title }}</span>
                    </div>
                </a>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'

export default {

    components: {
        AppLayout,
    },
    name: "Index",
    props: {
        feeds: Array,
    },
}
</script>

<style scoped>

</style>
