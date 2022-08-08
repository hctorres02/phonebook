<template>
    <auth-layout>
        <user-form action="/users">Cadastrar usuário</user-form>
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
