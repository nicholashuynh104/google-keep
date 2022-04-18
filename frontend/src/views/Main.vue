<template>
    <div>
        <v-container class="mt-1">
            <v-row>
                <v-col
                    xl="6"
                    md="8"
                    sm="12"
                    class="offset-xl-3 offset-md-2 offset-sm-12"
                >
                    <v-card class="p-3">
                        <img src="../assets/logo.png" style="width:60%;height:70%;" alt=""> <br>
                        <router-link to="/register">
                            <v-btn v-on:click="showReg" class="bg-success w-100 my-2">Register</v-btn>
                        </router-link>

                        <router-link to="/login">
                            <v-btn v-on:click="showLogin" class="bg-warning w-100">Login</v-btn>
                        </router-link>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>
<script>
export default {
    name: "main",
    data() {
        return {
            login: false,
            register: true,
        };
    },
    methods: {
        showReg() {
            this.login = false;
            this.register = true;
        },
        showLogin() {

        }
    }
}
</script>