<template>
    <div class="container">
        <div class="form-group">
            <input type="text" v-model="v$.name.$model" @blur="saveName" class="form-control" :class="{ 'is-invalid' : v$.name.$error }">
        </div>
        <div class="invalid-feedback" :class="{ 'd-block' : v$.name.required.$invalid }">
            Обязательное поле.
        </div>
        <div class="invalid-feedback" :class="{ 'd-block' : v$.name.maxLength.$invalid }">
            Макс. количество символов: {{ v$.name.maxLength.$params.max }}.
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
import axios from "axios";
import {useVuelidate} from '@vuelidate/core';
import {required, maxLength} from '@vuelidate/validators';

export default {
    name: "ShowDesk",
    props: [
        'deskId'
    ],
    setup() {
        return {
            v$: useVuelidate()
        };
    },
    data() {
        return {
            name: null,
            lists: [],
            errored: false,
            is_loading: true
        }
    },
    mounted() {
        axios.get('/api/desks/' + this.deskId)
            .then(res => {
                this.name = res.data.data.name;
                this.lists = res.data.data.lists
            })
            .catch(error => {
                console.log(error);
                this.errored = true
            })
            .finally(() => this.is_loading = false)

    },
    methods: {
        saveName() {
            if (this.v$.$error) {
                return false;
            }
            this.is_loading = true;
            axios.post('/api/desks/' + this.deskId, {
                _method: 'PUT',
                name: this.name
            })
                .then(res => console.log(res.data.data))
                .catch(error => {
                    console.log(error);
                    this.errored = true
                })
                .finally(() => this.is_loading = false)
        },


    },
    validations () {
        return {
            name: {
                required,
                maxLength: maxLength(255)
            }
        }
    }
}
</script>

<style scoped>

</style>
