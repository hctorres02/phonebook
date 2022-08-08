<template>
    <guest-layout>
        <div class="row">
            <div class="col-md-3 col-12 mx-auto pt-4">
                <form @submit.prevent="form.post('/login')">
                    <div class="form-row">
                        <div class="form group col border-bottom mb-2">
                            <h3>Login</h3>
                        </div>
                    </div>
                    <div class="form row">
                        <div class="form-group col">
                            <label for="email">E-mail</label>
                            <input
                                v-model="form.email"
                                type="email"
                                id="email"
                                class="form-control"
                            />
                        </div>
                    </div>
                    <div class="form row">
                        <div class="form-group col">
                            <label for="password">Senha</label>
                            <input
                                v-model="form.password"
                                type="password"
                                id="password"
                                class="form-control"
                            />
                        </div>
                    </div>
                    <div class="form row">
                        <div class="form-group col">
                            <div class="form-check">
                                <input
                                    v-model="form.remember"
                                    class="form-check-input"
                                    type="checkbox"
                                    id="remember"
                                />
                                <label class="form-check-label" for="remember">Manter-se conectado</label>
                            </div>
                        </div>
                    </div>
                    <div class="form row">
                        <div class="form-group col">
                            <button type="submit" class="btn btn-primary">Conectar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </guest-layout>
</template>

<script>
    import GuestLayout from "@/Layouts/Guest";

    export default {
        name: "Login",
        components: {
            GuestLayout
        },
        data() {
            return {
                form: this.$inertia.form({
                    email: null,
                    password: null,
                    remember: false
                }),
            };
        }
    };
</script>
