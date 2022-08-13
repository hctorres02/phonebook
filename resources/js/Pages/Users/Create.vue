<template>
    <auth-layout title="Cadastrar usuário" back-to="/users">
        <user-form action="/users" method="post" caption="Salvar" :user="user" :roles="roles" />
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";
    import UserForm from "@/Pages/Users/Form";

    export default {
        name: "CreateUser",
        props: {
            user: Object,
            roles: Array
        },
        components: {
            AuthLayout,
            UserForm
        }
    };
</script>

<style>
</style>
