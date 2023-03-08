<template>
    <div class="card mt-3">
        <router-link :to="{name: 'showDesk', params: {deskId: this.deskId}}" class="card-body">
            <h5 class="card-title">{{ name }}</h5>
        </router-link>
        <button type="button" class="btn btn-danger mt-3" @click="deleteDesk">Удалить</button>
    </div>
</template>

<script>
import showDesk from "./ShowDesk.vue";
import axios from "axios";

export default {
    name: "Desk",
    computed: {
        showDesk() {
            return showDesk
        }
    },
    props: {
        name: {
            type: String,
            default: ''
        },
        deskId: {
            type: Number,
            default: null
        }
    },
    methods: {
        deleteDesk() {
            this.$emit('deleteDesk', {
                id: this.deskId
            });
        }
    }
}
</script>

<style scoped>

</style>
