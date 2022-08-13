<template>
    <auth-layout title="Editar usuário" :back-to="`/users/${user.id}`">
        <template #buttons>
            <LinkDestroy
                v-if="user.id != currentUser.id"
                :href="`/users/${user.id}`"
                label="Excluír usuário"
            />
        </template>
        <user-form
            :action="`/users/${user.id}`"
            method="put"
            caption="Salvar alterações"
            :user="user"
            :roles="roles"
        />
    </auth-layout>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";
    import AuthLayout from "@/Layouts/Auth";
    import UserForm from "@/Pages/Users/Form";
    import LinkDestroy from "@/CommonParts/LinkDestroy";

    export default {
        name: "EditUser",
        components: {
            LinkDestroy,
            AuthLayout,
            UserForm
        },
        props: {
            user: Object,
            roles: Object
        }
    };
</script>
