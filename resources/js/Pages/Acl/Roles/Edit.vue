<template>
    <auth-layout title="Editar perfil">
        <template #buttons>
            <LinkDestroy v-if="!role.is_admin" :href="`/roles/${role.id}`" label="Excluír perfil" />
        </template>
        <role-form
            method="put"
            :action="`/roles/${role.id}`"
            caption="Salvar alterações"
            :role="role"
        />
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";
    import RoleForm from "@/Pages/Acl/Roles/Form";
    import LinkDestroy from "@/CommonParts/LinkDestroy";

    export default {
        name: "EditRole",
        props: {
            role: Object,
        },
        components: {
            AuthLayout,
            RoleForm,
            LinkDestroy
        }
    };
</script>
