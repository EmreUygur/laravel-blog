<template>
    <div 
        :class="[success ? 'bg-green-100 border-green-500 text-green-900': 'bg-red-100 border-red-500 text-red-900']" 
        class="border-t-4 rounded-b text-green-900 px-4 py-3 select-none cursor-pointer shadow-md my-2" 
        role="alert"
    >
        <div class="flex">
            <div class="py-1">
                <svg :class="[success ? 'text-green-500' : 'text-red-500']" class="fill-current h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
            <p class="font-bold">
                <span v-if="success">Success</span>
                <span v-else>Error</span>
            </p>
            <p class="text-sm">{{ message }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AlertBox",
    props: {
        success: {
            type: Boolean,
            required: true
        },
        message: {
            type: String,
            required: true
        }
    }
}
</script>