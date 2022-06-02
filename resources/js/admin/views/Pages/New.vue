<template>
    <v-container fill-height fluid grid-list-xl>
        <v-layout justify-center wrap>
            <v-flex md12>
                <PageForm title="নতুন পেজ"
                          short-description="নতুন পেজ তৈরীর সময় প্রতিটি শব্দ বাংলায় লেখা পরামর্শিত"
                />
            </v-flex>
        </v-layout>
    </v-container>

</template>
<script>
import PageForm from "@/components/forms/PageForm";

export default {
    components: {
        PageForm,
    },
}
</script>
