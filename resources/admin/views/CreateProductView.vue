<template>
    <div class="">
        <v-toolbar flat>
            <v-toolbar-title>{{ product.product_name_ru }}</v-toolbar-title>
            <v-spacer></v-spacer>
            <div>
                <v-switch
                    v-model="product.auto_price"
                    label="Автоматический пересчет цены"
                    hide-details
                    color="success"
                ></v-switch>
            </div>
            <v-spacer></v-spacer>
            <div>
                <v-switch
                    v-model="product.published"
                    label="Опубликовано"
                    hide-details
                    color="success"
                ></v-switch>
            </div>
        </v-toolbar>
        <v-card class="px-4 py-1">
            <v-row>
                <v-col class="d-flex align-center">
                    <b class="mr-2">Код товара:</b>
                    <v-text-field class="d-inline-block mt-0 pt-0"
                                  v-model="product.product_code"
                                  hide-details="auto"
                                  type="number"
                    ></v-text-field>
                </v-col>
                <v-col class="d-flex align-center">
                    <b class="mr-2">Цена закупки:</b>
                    <v-text-field class="d-inline-block mt-0 pt-0"
                                  v-model="product.price"
                                  hide-details="auto"
                                  type="number"
                    ></v-text-field>
                </v-col>
                <v-col class="d-flex align-center">
                    <b class="mr-2">Цена продажи:</b>
                    <v-text-field class="d-inline-block mt-0 pt-0"
                                  v-model="product.retail_price"
                                  :disabled=product.auto_price
                                  hide-details="auto"
                                  type="number"
                    ></v-text-field>
                </v-col>
                <v-col class="d-flex align-center">
                    <b class="mr-2">Единицы измерения:</b>
                    <v-text-field class="d-inline-block mt-0 pt-0"
                                  v-model="product.unit"
                                  hide-details="auto"
                                  type="text"
                    ></v-text-field>
                </v-col>
            </v-row>

        </v-card>
        <v-card class="mt-5">
            <v-row no-gutters>
                <v-col
                    cols="6"
                    sm="6"
                    class="pa-2"
                >
                    <v-card-title>
                        Название <b class="ml-1">RU</b>
                    </v-card-title>
                    <v-text-field
                        class="px-4"
                        v-model="product.product_name_ru"
                        type="text"
                        hide-details="auto"
                    ></v-text-field>
                </v-col>
                <v-col
                    cols="6"
                    sm="6"
                    class="pa-2"
                >
                    <v-card-title>
                        Название <b class="ml-1">УКР</b>
                    </v-card-title>
                    <v-text-field
                        class="px-4"
                        v-model="product.product_name_uk"
                        type="text"
                        hide-details="auto"
                    ></v-text-field>
                </v-col>
                <v-spacer></v-spacer>
                <v-col
                    cols="6"
                    sm="6"
                    class="pa-2"
                >
                    <v-card-title>
                        Описание <b class="ml-1">РУ</b>
                    </v-card-title>
                    <tiptap-vuetify
                        v-model="product.description_ru"
                        :extensions="extensions"
                    />

                </v-col>
                <v-col
                    cols="6"
                    sm="6"
                    class="pa-2"
                >
                    <v-card-title>
                        Описание <b class="ml-1">УКР</b>
                    </v-card-title>
                    <tiptap-vuetify
                        v-model="product.description_uk"
                        :extensions="extensions"
                    />

                </v-col>
                <v-spacer>

                </v-spacer>
                <v-col
                    cols="6"
                    sm="6"
                    class="pa-2"
                >
                    <v-card-title>
                        Поисковые запросы <b class="ml-1">RU</b>
                    </v-card-title>
                    <v-card-subtitle>Запросы перечислять через запятую</v-card-subtitle>
                    <v-text-field
                        class="px-4"
                        v-model="product.search_query_ru"
                        type="text"
                        hide-details="auto"
                    >
                    </v-text-field>
                </v-col>
                <v-col
                    cols="6"
                    sm="6"
                    class="pa-2"
                >
                    <v-card-title>
                        Поисковые запросы <b class="ml-1">УКР</b>
                    </v-card-title>
                    <v-card-subtitle>Запросы перечислять через запятую</v-card-subtitle>
                    <v-text-field
                        class="px-4"
                        v-model="product.search_query_uk"
                        type="text"
                        hide-details="auto"
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-btn
                class="ma-4 "
                color="success"
                @click="save"
            >
               Сохранить

            </v-btn>
        </v-card>
    </div>
</template>

<script>
import axios from "axios";
import {
    TiptapVuetify,
    Heading,
    Bold,
    Italic,
    Strike,
    Underline,
    Code,
    Paragraph,
    BulletList,
    OrderedList,
    ListItem,
    Link,
    Blockquote,
    HardBreak,
    HorizontalRule,
    History
} from 'tiptap-vuetify'

export default {
    name: "CreateProductView",
    data() {
        return {
            product_name: '',
            saving: false,
            product: {
                auto_price: true,
                published: true,
                description_ru: ``,
                description_uk: ``,
                product_name_ru: '',
                product_name_uk: '',
                search_query_ru: '',
                search_query_uk: '',
                unit: '',
                retail_price: '',
                price: ''


            },
            extensions: [
                History,
                Blockquote,
                Link,
                Underline,
                Strike,
                Italic,
                ListItem,
                BulletList,
                OrderedList,
                [Heading, {
                    options: {
                        levels: [1, 2, 3]
                    }
                }],
                Bold,
                Code,
                HorizontalRule,
                Paragraph,
                HardBreak
            ],

        }
    },
    // created() {
    //     this.getItem();
    // },
    methods: {
        // getItem() {
        //     console.log(this.$route.params.id, 'this.$route.params.id')
        //     axios.get(`/api/products/${this.$route.params.id}`).then((res) => {
        //         this.product = res.data;
        //         this.product_name = res.data.product_name_ru;
        //     })
        // },
        save(){
            axios.post(`/api/products/create`, this.product).then(res=>{
                this.$router.push('/products') ;
            })
        }
    },
    components: {
        TiptapVuetify
    }
}
</script>

<style scoped>

</style>
