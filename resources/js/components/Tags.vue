<template>
    <div>
        <div class="tags-container">
            <div v-for="tag in selectedTags" :key="tag.id" class="tag">
                <span>{{ tag.name }}</span>
                <i class="fas fa-times" @click="discardTag(tag.id)"></i>
            </div>
            <input v-model="newTag" />
            <button type="button" class="px-2 py-1 bg-gray-200" @click="addTag">Add</button>
        </div>
        <!-- <input type="hidden" id="tags[]" name="tags[]" :value="selectedTags.map(tag => tag.id)"> -->
        <input 
            v-for="(tag, index) in selectedTags" 
            v-bind:key="index" 
            :name="'tags['+ index + ']'" 
            type="hidden" 
            :value="tag.id" >
    </div>
</template>

<script>
export default {
    props: {
        selected: {
            required: false,
            default: []
        },
        all: {
            required: false
        }
    },
    data: function () {
        return {
            tagList: this.all,
            selectedTags: this.selected,
            newTag: ""
        }
    },
    methods: {
        discardTag: function (id) {
            for(var x = 0; x < this.selectedTags.length; x++) {
                if (this.selectedTags[x].id === id)
                    this.selectedTags.splice(x, 1);
            }
        },
        addTag: function () {
            if (this.newTag === "") return;

            for(var x = 0; x < this.tagList.length; x++) {
                if (this.tagList[x].name.toUpperCase() === this.newTag.toUpperCase()) {
                    this.selectedTags.push(this.tagList[x]);
                    this.newTag = "";
                    return;
                }
            }
            const tag = { id: this.tagList.length + 1, name: this.newTag };

            this.tagList.push(tag);
            this.selectedTags.push(tag);
            axios.post('/blog/tags/', { name: this.newTag }).then(response => {
                console.log(response.data.message);
            }).catch(error => {
                console.log(error);
            });
            this.newTag = "";
        }
    }
}
</script>

<style>
.tags-container {
    border: 2px solid #ccc;
    padding: 10px;
    border-radius: 5px;
    display: flex;
    flex-wrap: wrap;
    -ms-flex-wrap: wrap;
}
.tags-container .tag {
    padding: 5px;
    border: 1px solid #ccc;
    background-color: #f2f2f2;
    display: flex;
    border-radius: 3px;
    align-items: center;
    margin: 5px;
}

.tag i {
    font-size: 12px;
    margin-left: 5px;
    cursor: pointer;
}

.tags-container input {
    flex: 1;
}
</style>