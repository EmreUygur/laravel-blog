<template>
    <div class="share-box bg-gray-200 text-gray-700">
        <!-- <button class="p-4 hover:bg-gray-700 hover:text-gray-200"><i class="fas fa-share-alt text-2xl"></i></button> -->
        <a :href="'https://www.facebook.com/sharer/sharer.php?u='+url+'&t=&quote='" target="_blank" class="p-4 hover:bg-gray-700 hover:text-gray-200"><i class="fab fa-facebook text-2xl"></i></a>
        <a :href="'https://twitter.com/intent/tweet?text='+url" target="_blank" class="p-4 hover:bg-gray-700 hover:text-gray-200"><i class="fab fa-twitter text-2xl"></i></a>
        <a :href="'https://www.linkedin.com/uas/login?session_redirect='+url" target="_blank" class="p-4 hover:bg-gray-700 hover:text-gray-200"><i class="fab fa-linkedin text-2xl"></i></a>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            required: true
        }
    },
    data () {
        return {
            url: location.href
        }
    }
}
</script>