<template>
    <router-view></router-view>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    #app {
        background-color: #FFFFFF;
    }

    .wrapper {
        flex: 1 0 auto;
    }

</style>
