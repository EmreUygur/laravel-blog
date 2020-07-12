<template>
    <div class="pagination">
        <a href="/blog?page=1" v-if="(currentpage - 2) >= 1" class="page-element">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a :href="'/blog?page='+n" v-for="n in pageList" :key="n" class="page-element" :class="[n === currentpage ? 'active' : '']">
            {{ n }}
        </a>
        <a :href="'/blog?page='+numofpages" v-if="(currentpage + 2) <= numofpages" class="page-element">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
</template>

<script>
export default {
    props: {
        numofpages: {
            type: Number
        },
        currentpage: {
            type: Number
        }
    },
    computed: {
        pageList: function () {
            var list = []
            for (var x = this.currentpage ; x < this.currentpage+3 ; x++) {
                if(this.currentpage == 1)
                    list.push(x)
                else if(this.currentpage == this.numofpages)
                    list.push(x-2)
                else
                    list.push(x-1)
            }
            return list
        }
    }
}
</script>
