<template>
<!--        <nav>-->
<!--            <router-link to="/">Home</router-link>-->
<!--            <router-link to="/about">About</router-link>-->
<!--        </nav>-->
<!--        <router-view/>-->

        <v-app>
asdasdasd
            <v-navigation-drawer app>
<!--                <v-card-->
<!--                    class="mx-auto"-->
<!--                    max-width="300"-->
<!--                    tile-->
<!--                >-->
<!--                    <v-list shaped>-->
<!--                        <v-subheader>REPORTS</v-subheader>-->
<!--                        <v-list-item-group-->
<!--                            v-model="selectedItem"-->
<!--                            color="primary"-->
<!--                        >-->
<!--                            <v-list-item-->
<!--                                v-for="(item, i) in items"-->
<!--                                :key="i"-->
<!--                            >-->
<!--                                <v-list-item-icon>-->
<!--                                    <v-icon v-text="item.icon"></v-icon>-->
<!--                                </v-list-item-icon>-->
<!--                                <v-list-item-content>-->
<!--                                    <v-list-item-title v-text="item.text"></v-list-item-title>-->
<!--                                </v-list-item-content>-->
<!--                            </v-list-item>-->
<!--                        </v-list-item-group>-->
<!--                    </v-list>-->
<!--                </v-card>-->
            </v-navigation-drawer>

            <v-app-bar app>

            </v-app-bar>


            <v-main>

                <!-- Provides the application the proper gutter -->
                <v-container fluid>

                    <!-- If using vue-router -->
                    <router-view></router-view>
                </v-container>
            </v-main>


        </v-app>
</template>

<style lang="scss">
#app {
    background: wheat;

}
</style>
