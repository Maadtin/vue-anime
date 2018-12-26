<template>





    <v-form class="login-form" @submit.prevent="login" v-model="valid">
        <v-layout row wrap>
            <v-flex xs12>
                <v-text-field type="email" v-model="email" label="Email" required></v-text-field>
            </v-flex>
            <v-flex xs12>
                <v-text-field type="password" v-model="password" label="Contraseña" required></v-text-field>
            </v-flex>

            <v-flex xs12>
                <v-btn color="indigo anime-button">Entrar</v-btn>
            </v-flex>

        </v-layout>
    </v-form>



</template>

<script>
    export default {
        name: "Registro",
        data: () => ({
            username: '',
            email: '',
            password: '',
            valid: false
        }),
        methods: {
            login() {
                console.log(this.$data);
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