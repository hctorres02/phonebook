<template>
    <div>
        <h4>{{ title }}</h4>
        <hr />
        <form @submit.prevent="form.submit(method, action)">
            <div class="form-row">
                <div class="form-group col">
                    <label for="name">Nome</label>
                    <input v-model="form.name" type="text" id="name" class="form-control" />
                    <small v-if="form.errors.name" class="text-danger">{{ form.errors.name }}</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="email">E-mail</label>
                    <input v-model="form.email" type="email" id="email" class="form-control" />
                    <small v-if="form.errors.email" class="text-danger">{{ form.errors.email }}</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <button class="btn btn-primary">{{ caption }}</button>
                </div>
            </div>
        </form>
        <div v-if="user.id && user.id != currentUser.id" class="form-row">
            <div class="form-group col">
                <Link
                    :href="`/users/${this.user.id}`"
                    class="btn btn-outline-danger"
                    method="delete"
                    as="button"
                >Excluír usuário</Link>
            </div>
        </div>
    </div>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";

    export default {
        name: "UserForm",
        components: {
            Link
        },
        props: {
            title: String,
            caption: String,
            user: {
                type: Object,
                default() {
                    return {
                        id: null,
                        name: null,
                        email: null
                    };
                }
            }
        },
        data() {
            return {
                form: this.$inertia.form(this.user),
                action: this.user.id ? `/users/${this.user.id}` : "/users",
                method: this.user.id ? "put" : "post"
            };
        },
        computed: {
            currentUser() {
                return this.$page.props.auth.user;
            }
        }
    };
</script>
