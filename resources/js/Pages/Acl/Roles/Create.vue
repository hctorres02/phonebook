<template>
    <auth-layout title="Cadastrar perfil">
        <role-form
            action="/roles"
            method="post"
            caption="Salvar"
            :role="role"
            :permissions="permissions"
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
            permissions: Array,
        },
        components: {
            AuthLayout,
            RoleForm
        }
    };
</script>
