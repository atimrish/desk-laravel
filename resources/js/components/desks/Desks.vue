<template>
    <div class="container">
        <h3>Доски</h3>
        <div class="row">
            <div class="col-lg-4" v-for="desk in desks">
                <div class="card mt-3">
                    <a href="#" class="card-body">
                        <h5 class="card-title">{{ desk.name }}</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="alert alert-danger" role="alert" v-if="errored">
            error!!!
        </div>
        <div class="spinner-border" style="width: 4rem; height: 4rem;" role="status" v-if="is_loading">
            <span class="visually-hidden">Загрузка...</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "Desks",

    mounted() {
        axios.get('/api/desks')
            .then(response => this.desks = response.data.data)
            .catch(
                error => {
                    console.log(error);
                    this.errored = true;
                }
            )
            .finally(() => this.is_loading = false)
    },

    data() {
        return {
            desks: [],
            errored: false,
            is_loading: true
        }
    }

}
</script>

<style scoped>

</style>
