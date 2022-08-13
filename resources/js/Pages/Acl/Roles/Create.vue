<template>
    <auth-layout title="Cadastrar perfil">
        <role-form
            action="/roles"
            method="post"
            caption="Salvar"
            :role="role"
        />
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";
    import RoleForm from "@/Pages/Acl/Roles/Form";

    export default {
        name: "CreateRole",
        props: {
            role: Object,
        },
        components: {
            AuthLayout,
            RoleForm
        }
    };
</script>
