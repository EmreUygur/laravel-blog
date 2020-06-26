<template>
    <div class="share-box bg-gray-200 text-gray-700">
        <!-- <button class="p-4 hover:bg-gray-700 hover:text-gray-200"><i class="fas fa-share-alt text-2xl"></i></button> -->
        <button class="p-4 hover:bg-gray-700 hover:text-gray-200"><i class="fab fa-facebook text-2xl"></i></button>
        <button class="p-4 hover:bg-gray-700 hover:text-gray-200"><i class="fab fa-twitter text-2xl"></i></button>
        <button class="p-4 hover:bg-gray-700 hover:text-gray-200"><i class="fab fa-whatsapp text-2xl"></i></button>
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
    },
    methods: {
        
    }
}
</script>