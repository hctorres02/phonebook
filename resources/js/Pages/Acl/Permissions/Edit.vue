<template>
    <auth-layout title="Editar permissão">
        <template #buttons>
            <LinkDestroy
                v-if="can('can_perrmissions_destroy')"
                :href="`/permissions/${permission.id}`"
                label="Excluír permissão"
            />
        </template>
        <permission-form
            method="put"
            :action="`/permissions/${permission.id}`"
            caption="Salvar alterações"
            :permission="permission"
        />
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";
    import PermissionForm from "@/Pages/Acl/Permissions/Form";
    import LinkDestroy from "@/CommonParts/LinkDestroy";

    export default {
        name: "EditPermission",
        props: {
            permission: Object
        },
        components: {
            AuthLayout,
            PermissionForm,
            LinkDestroy
        }
    };
</script>
