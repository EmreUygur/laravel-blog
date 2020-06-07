<template>
    <div>
        <ckeditor v-model="editorData" :config="editorConfig"></ckeditor>
        <input type="hidden" name="body" :value="editorData">
    </div>
</template>

<script>
    import CKEditor from 'ckeditor4-vue';
    export default {
        name: 'app',
        components: {
            ckeditor: CKEditor.component
        },
        props: {
            body: {
                required: false,
                default: ""
            }
        },
        data() {
            return {
                editorData: this.body,
                editorConfig: {
                    fillEmptyBlocks: false
                }
            };
        }
    }
</script>