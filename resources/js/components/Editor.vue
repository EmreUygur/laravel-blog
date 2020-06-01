<template>
    <div id="app">
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
        data() {
            return {
                editorData: '<p>Content of the editor.</p>',
                editorConfig: { }
            };
        }
    }
</script>