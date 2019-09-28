<template>
    <v-container fluid>
        <v-container class="grey lighten-5">
            <v-row no-gutters>
                <v-col
                    cols="6"
                    md="4"
                >
                    <v-card
                        class="pa-2"
                        outlined
                        tile
                    >
                        <v-col
                            align-self="start"
                            class="pa-0"
                            cols="12"
                        >
                            <v-avatar
                                class="profile"
                                color="grey"
                                size="164"
                                tile
                            >
                                <v-img
                                    src="https://i.pinimg.com/736x/70/ae/ed/70aeed769408dede74aaf1818bd3bb32.jpg"></v-img>
                            </v-avatar>
                        </v-col>
                        <v-col class="py-0">
                            <v-list-item
                                dark
                            >
                                <v-list-item-content>
                                    <v-list-item-title class="title"> {{ surname }} {{ name }} {{ patronymic }}
                                    </v-list-item-title>
                                    <v-list-item-subtitle> {{ character }}</v-list-item-subtitle>
                                </v-list-item-content>
                                <v-list-item-content>
                                    <v-list-item-title class="title"> Возраст: {{ age }}</v-list-item-title>
                                    <v-list-item-title class="title"> Учреждение: {{ place }}</v-list-item-title>
                                    <v-list-item-title class="title"> E-mail: {{ email }}</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-col>
                    </v-card>
                </v-col>
                <v-col
                    cols="12"
                    sm="6"
                    md="8"
                >
                    <v-card
                        class="pa-2"
                        outlined
                        tile
                    >
                        <v-row>
                            <p class="font-weight-black headline text-center" >Галерея</p>
                            <v-carousel
                                cycle
                                height="400"
                                hide-delimiter-background
                                show-arrows-on-hover
                            >
                                <v-carousel-item
                                    v-for="(item, i) in albums"
                                    :key="i"
                                    :src="item.albums"
                                    reverse-transition="fade-transition"
                                    transition="fade-transition"
                                >
                                </v-carousel-item>
                            </v-carousel>
                        </v-row>
                        <v-row>
                            <p class="font-weight-black headline text-center" >Встречи</p>
                        </v-row>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-container>
</template>

<script>
    export default {
        data() {
            return {
                name: 'Вероника',
                surname: 'Плотникова',
                patronymic: 'Сергеевна',
                age: '20',
                city: 'Санкт-Петербург',
                email: 'Plotnikova99.99@gmail.com',
                character: 'Frontend разработчик',
                place: 'VK Hackathon',
                foto: 'https://i.pinimg.com/736x/70/ae/ed/70aeed769408dede74aaf1818bd3bb32.jpg',
                albums: [
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg',
                    },
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/sky.jpg',
                    },
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/bird.jpg',
                    },
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/planet.jpg',
                    }
                ]
            }
        }
    }
</script>

<style scoped>

</style>
