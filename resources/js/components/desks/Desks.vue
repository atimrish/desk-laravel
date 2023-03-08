<template>
    <div class="container">
        <h3>Доски</h3>
        <div class="row">
            <div class="col-lg-4" v-for="(desk, index) in desks">
                <desk :name="desk.name" :desk-id="desk.id" :key="index" @deleteDesk="deleteDesk"></desk>
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
import Desk from "./Desk.vue";
import axios from "axios";
export default {
    name: "Desks",
    components: {
        Desk
    },


    mounted() {
        this.getDesks();
    },

    data() {
        return {
            desks: [],
            errored: false,
            is_loading: true
        }
    },

    methods: {
        getDesks() {
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
        deleteDesk(data) {
            if (confirm('Вы действительно хотите удалить доску')) {
                axios.post('/api/desks/' + data.id, {
                    _method: 'DELETE'
                })
                    .then(() => {
                        this.desks = [];
                        this.getDesks();
                    })
            }
        }
    }

}
</script>

<style scoped>

</style>
