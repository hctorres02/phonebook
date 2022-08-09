<template>
    <auth-layout title="Cadastrar usuário" back-to="/users">
        <user-form action="/users" method="post" caption="Salvar" />
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";
    import UserForm from "@/Pages/Users/Form";

    export default {
        name: "CreateUser",
        components: {
            AuthLayout,
            UserForm
        }
    };
</script>

<style>
</style>
