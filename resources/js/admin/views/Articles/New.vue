<template>
    <v-container fill-height fluid grid-list-xl>
        <v-layout justify-center wrap>
            <v-flex md12>
                <ArticleForm title="নতুন আর্টিকেল"
                             short-description="নতুন আর্টিকেল তৈরীর সময় প্রতিটি শব্দ বাংলায় লেখা পরামর্শিত"
                />
            </v-flex>
        </v-layout>
    </v-container>

</template>
<script>
import ArticleForm from "@/components/forms/ArticleForm";

export default {
    components: {
        ArticleForm
    },
}
</script>
