<template>
    <auth-layout>
        <user-form :user="user" title="Editar usuário" caption="Salvar alterações" />
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";
    import UserForm from "@/Pages/Users/Form";

    export default {
        name: "EditUser",
        components: {
            AuthLayout,
            UserForm
        },
        props: {
            user: Object
        }
    };
</script>

<style>
</style>
