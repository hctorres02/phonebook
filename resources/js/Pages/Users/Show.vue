<template>
    <auth-layout :title="user.name" back-to="/users">
        <template #buttons>
            <Link :href="`/users/${user.id}/edit`" class="btn btn-primary">
                <i class="bi bi-pencil"></i>
                Editar usuário
            </Link>
            <LinkDestroy
                v-if="user.id != currentUser.id"
                :href="`/users/${user.id}`"
                label="Excluír usuário"
            />
        </template>
        <div class="form-row">
            <div class="col-md-3 col font-weight-bold">E-mail</div>
            <div class="col">{{ user.email }}</div>
        </div>
    </auth-layout>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";
    import AuthLayout from "@/Layouts/Auth";
    import LinkDestroy from "@/CommonParts/LinkDestroy";

    export default {
        props: {
            user: Object
        },
        components: {
            AuthLayout,
            Link,
            LinkDestroy
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
