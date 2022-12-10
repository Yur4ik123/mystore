<template>
    <div class="products__table-wrapper">


        <v-card
            class="mb-2  pa-2"
        >
            <v-btn
                depressed
                color="primary"
                @click="importProducts"
            >
                Импорт
            </v-btn>
            <v-btn
                class="ml-5"
                depressed
                color="success"
                to="/products/create">
                Создать
            </v-btn>

        </v-card>
        <v-simple-table dense>

            <template v-slot:default>
                <thead>
                <tr>
                    <th class="text-left">
                        Код товара
                    </th>
                    <th class="text-left">
                        Название
                    </th>
                    <th class="text-left">
                        Цена закупка
                    </th>
                    <th class="text-left">
                        Цена продажа
                    </th>
                    <th class="text-left">
                        Остаток
                    </th>
                    <th class="text-left">
                        Наличие
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr
                    v-for="item in products_list"
                    :key="item.product_code"
                >
                    <td>{{ item.product_code }}</td>
                    <td>
                        <router-link :to="`/products/${item.id}`" class="">{{ item.product_name_ru }}</router-link>
                    </td>
                    <td>{{ item.price }}</td>
                    <td>{{ item.retail_price }}</td>
                    <td>{{ item.balance }}</td>
                    <td >{{ item.available }}</td>
                </tr>
                </tbody>
            </template>
        </v-simple-table>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: "Products",
    data() {
        return {
            products_list: []
        }
    },
    created() {
        this.getProductsLists();
    },
    methods: {
        importProducts() {
            axios.post('/api/products/xml-import')
            console.log('asfasfasfs')
        },
        getProductsLists() {
            axios.get('/api/products/all').then((res) => {
                this.products_list = res.data.products_list;
                console.log(res)
            })
        }
    }
}
</script>

<style scoped>

</style>
