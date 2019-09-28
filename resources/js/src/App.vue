<template>
    <div id="app">
        <v-app class="body">
            <div class="wrapper">
                <v-content>
                    <router-view></router-view>
                </v-content>
            </div>
        </v-app>
    </div>

</template>

<script>
    export default {
        name: "App",
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    .body {
        display: flex;
        flex-direction: column;
    }

    .wrapper {
        flex: 1 0 auto;
    }

</style>
