<template>
    <auth-layout>
        <user-form action="/users" title="Cadastrar usuário" caption="Salvar" />
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
