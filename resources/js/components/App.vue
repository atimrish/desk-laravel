<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-nav">
            <router-link class="nav-item nav-link" :to="{name: 'home'}">Главная</router-link>
            <router-link class="nav-item nav-link" :to="{name : 'desks'}">Доски</router-link>
        </div>
    </nav>
    <router-view>

    </router-view>
</template>

<script>
export default {
    name: "App"
}
</script>

<style scoped>

</style>
