<template>

    <material-card
        :color="$store.state.app.color"
        :title="title"
        :text="shortDescription"
    >
        <ValidationObserver ref="obs" v-slot="{ invalid, validated, handleSubmit, validate }">

            <v-form>
                <v-container>
                    <v-row>

                        <v-col cols="12" md="12">
                            <VTextFieldWithValidation v-model="form.title_bn" rules="required" ref="title"
                                                      field="title"
                                                      :label="'শিরোনাম*'"/>
                        </v-col>

                        <v-col cols="12" md="4">
                            <VRadioInputWithValidation field="প্রকাশিত"
                                                       :rules="'required'"
                                                       :options="[{label: !articleKey?'হ্যা':$t('Common.yes'), value: 1}, {label: !articleKey?'না':$t('Common.no'), value: 0}]"
                                                       v-model="form.published"/>
                        </v-col>


                        <v-col cols="12" md="12">
                            <span>আর্টিকেল (ঠিক যেভাবে সাইটে দেখতে চান)</span>
                            <vue-editor :editorOptions="editorConfig"
                                        v-model="form.description_bn"/>
                        </v-col>

                        <v-col cols="12" md="6">
                            <VTextAreaFieldWithValidation v-model="form.excerpt_bn"
                                                          rules="required"
                                                          ref="excerpt"
                                                          rows="2"
                                                          field="short_description"
                                                          :label="'সংক্ষিপ্ত বর্ননা*'"
                                                          hint="গুগলের সার্চ ইঞ্জিনের জন্য প্রদর্শিত হবে"/>
                        </v-col>

                        <v-col cols="12" sm="12" md="6">
                            <VTextAreaFieldWithValidation v-model="form.keywords"
                                                          rules="required"
                                                          rows="2"
                                                          ref="keywords"
                                                          field="keywords"
                                                          :label="'আর্টিকেলের গুরুত্বপুর্ন শব্দগুলি*'"
                                                          placeholder="seo keyword"
                                                          hint="প্রতিটি শব্দ কমা (,) দিয়ে আলাদা হতে হবে"/>

                        </v-col>

                    </v-row>
                    <v-row>
                        <v-col style="text-align: center">
                            <v-btn  :loading="loading" depressed color="primary" @click="handleSubmit(save)">
                                {{$t('Common.save')}}
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-container>
            </v-form>

        </ValidationObserver>
    </material-card>


</template>
<script>
import MaterialCard from '@/components/material/Card'
import VTextAreaFieldWithValidation from "@/components/inputs/VTextAreaFieldWithValidation";
import VTextFieldWithValidation from "@/components/inputs/VTextFieldWithValidation";
import VSelectSearchWithValidation from "@/components/inputs/VSelectSearchWithValidation";
import VFileInputWithValidation from "@/components/inputs/VFileInputWithValidation";
import {ValidationObserver} from 'vee-validate'
import pageApi from "@/api/resources/page";
import VRadioInputWithValidation from "@/components/inputs/VRadioInputWithValidation";
import {Quill, VueEditor} from "vue2-editor";
import {ImageDrop} from 'quill-image-drop-module'
import ImageResize from 'quill-image-resize-module'

Quill.register('modules/imageResize', ImageResize)
Quill.register('modules/imageDrop', ImageDrop)

export default {
    components: {
        VRadioInputWithValidation,
        VTextAreaFieldWithValidation,
        VTextFieldWithValidation,
        VSelectSearchWithValidation,
        VFileInputWithValidation,
        ValidationObserver,
        MaterialCard,
        VueEditor
    },
    props: {
        title: {
            type: String,
            default: "Article Form"
        },
        shortDescription: {
            type: String,
            default: ""
        },
        pageKey: {
            type: String,
            required: false
        }
    },
    data() {
        return {
            locale: this.$i18n.locale,
            loading: false,
            editorConfig: {
                modules: {
                    imageDrop: true,
                    imageResize: {}
                }
            },
            categories: [],
            form: {
                title_bn: '',
                excerpt_bn: '',
                published: 0,
                description_bn: '',
                keywords: '',
            }
        }
    },
    async mounted() {
        if (this.pageKey) {
            await this.get();
        }
    },
    methods: {
        async get() {
            this.loading = true;
            pageApi.get(this.pageKey).then(res => {
                res.data.data.image = null;

                if (res.data.data.keywords.length) {
                    res.data.data.keywords = res.data.data.keywords.map(item => item.title).toString();
                }

                this.form = res.data.data;
                this.loading = false;
            }).catch(err => {
                this.$toastr.e('Something went wrong! ' + err);
                this.loading = false;
            })
        },
        save() {
            this.loading = true;
            let reqUrl;

            if (this.pageKey) {
                reqUrl = pageApi.update(this.form)
            } else {
                reqUrl = pageApi.save(this.form)
            }

            reqUrl.then(res => {
                this.$toastr.s('Data saved successful');
                this.$router.push({name: 'pages'});
                this.loading = false;
            }).catch(err => {
                this.$toastr.e('Something went wrong! ' + err);
                this.loading = false;
            })
        }
    },
}
</script>
<style>
.editor {
    min-height: 300px !important;
}

#editor p {
    margin: 0 0 10px 0;
}
</style>
