<template>
    <auth-layout title="Cadastrar permissão">
        <permission-form
            action="/permissions"
            method="post"
            caption="Salvar"
            :permission="permission"
        />
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";
    import PermissionForm from "@/Pages/Acl/Permissions/Form";

    export default {
        name: "CreatePermission",
        props: {
            permission: Object
        },
        components: {
            AuthLayout,
            PermissionForm
        }
    };
</script>
