<template>
    <auth-layout title="Perfis">
        <template #buttons>
            <Link v-if="can('roles_create')" href="/roles/create" class="btn btn-primary">
                <i class="bi bi-person-badge"></i>
                Cadastrar perfil
            </Link>
        </template>
        <generic-table :source="roles">
            <template #thead>
                <tr>
                    <th style="width: 46px">#</th>
                    <th>Perfil</th>
                </tr>
            </template>
            <tr v-for="role in roles.data" :key="role.id">
                <td>{{ role.id }}</td>
                <td>
                    <Link v-if="can('roles_update')" :href="`/roles/${role.id}/edit`">{{ role.name }}</Link>
                    <span v-else>{{ role.name }}</span>
                    <small v-if="role.is_admin" class="badge badge-pill badge-success">super user</small>
                    <span class="d-block text-muted">{{ role.description }}</span>
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
            roles: Object
        },
        components: {
            AuthLayout,
            GenericTable,
            Link
        }
    };
</script>
