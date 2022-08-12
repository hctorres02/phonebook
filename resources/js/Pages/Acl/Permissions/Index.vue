<template>
    <auth-layout title="Permissões">
        <template #buttons>
            <Link href="/permissions/create" class="btn btn-primary">
                <i class="bi bi-person-badge"></i>
                Cadastrar permissão
            </Link>
        </template>
        <generic-table :source="permissions">
            <template #thead>
                <tr>
                    <th style="width: 46px">#</th>
                    <th>Permissão</th>
                </tr>
            </template>
            <tr v-for="permission in permissions.data" :key="permission.id">
                <td>{{ permission.id }}</td>
                <td>
                    <Link :href="`/permissions/${permission.id}/edit`">{{ permission.name }}</Link>
                    <small v-if="!permission.enabled" class="badge badge-pill badge-danger">inativo</small>
                    <span class="d-block text-muted">{{ permission.description }}</span>
                </td>
            </tr>
        </generic-table>
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";
    import GenericTable from "@/CommonParts/GenericTable";
    import { Link } from "@inertiajs/inertia-vue";

    export default {
        props: {
            permissions: Object
        },
        components: {
            AuthLayout,
            GenericTable,
            Link
        }
    };
</script>

<style>
</style>
