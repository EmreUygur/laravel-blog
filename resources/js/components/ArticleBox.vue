<template>
    <div @click="redirect" class="article-box flex flex-row w-full sm:1/2 p-6 mb-8 rounded cursor-pointer">
        <div class="mr-4 w-1/3">
            <img class="w-full h-full object-cover" :src="'/storage/cover_images/'+ cover_image" :alt="cover_image">
        </div>
        <div class="flex flex-col w-2/3">
            <div class="text-3xl text-gray-700 font-semibold">
                {{ title }}
            </div>
            <div class="flex flex-col text-gray-600 font-normal">
                <p class="text-lg">
                    {{ excerpt }}
                </p>
                <p class="text-sm mt-1">
                    {{ created_at }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        cover_image: String,
        title: String,
        excerpt: String,
        slug: String,
        created_at: String
    },
    methods: {
        redirect: function () {
            window.location.href = "/blog/articles/"+this.slug
        }
    }
}
</script>

<style>
    .article-box {
        transition: box-shadow .2s;
        box-shadow: none;
    }

    .article-box:hover, .article-box:focus {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
</style>