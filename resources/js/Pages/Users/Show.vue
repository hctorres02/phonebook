<template>
    <auth-layout>
        <h2>{{ user.name }}</h2>
        <p class="text-muted">{{ user.email }}</p>
        <p>
            <Link :href="`/users/${this.user.id}/edit`">Editar usuário</Link>
        </p>
        <p v-if="user.id && user.id != currentUser.id">
            <Link
                :href="`/users/${this.user.id}`"
                class="btn btn-outline-danger"
                method="delete"
                as="button"
            >Excluír usuário</Link>
        </p>
    </auth-layout>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";
    import AuthLayout from "@/Layouts/Auth";

    export default {
        props: {
            user: Object
        },
        components: {
            AuthLayout,
            Link
        },
        computed: {
            currentUser() {
                return this.$page.props.auth.user;
            }
        }
    };
</script>

<style>
</style>
