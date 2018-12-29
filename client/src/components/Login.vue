<template>





    <form class="login-form" @submit.prevent="login">
        <v-layout row wrap>
            <v-flex xs12>
                <v-text-field type="email" v-model="email" label="Email"></v-text-field>
            </v-flex>
            <v-flex xs12>
                <v-text-field type="password" v-model="password" label="Contraseña"></v-text-field>
            </v-flex>

            <v-flex xs12>
                <v-btn type="submit" color="indigo anime-button">Entrar</v-btn>
            </v-flex>

        </v-layout>
    </form>



</template>

<script>
    export default {
        name: "Registro",
        data: () => ({
            email: '',
            password: '',
        }),
        methods: {
            login() {

            }
        }
    }
</script>

<style scoped>

    .login-form {
        width: 700px;
        margin: 50px auto;
    }

</style>