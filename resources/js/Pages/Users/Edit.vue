<template>
    <auth-layout>
        <user-form :user="user" :errors="errors">Editar usuário</user-form>
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
            user: Object,
            errors: Object
        }
    };
</script>

<style>
</style>
