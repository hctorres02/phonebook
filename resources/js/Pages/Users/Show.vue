<template>
    <auth-layout>
        <h2>{{ user.name }}</h2>
        <p class="text-muted">{{ user.email }}</p>
        <p>
            <Link :href="`/users/${this.user.id}/edit`">Editar usuário</Link>
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
        }
    };
</script>

<style>
</style>
