<template>
    <auth-layout title="Usuários">
        <template #buttons>
            <Link href="/users/create" class="btn btn-primary">
                <i class="bi bi-person-plus"></i>
                Cadastrar usuário
            </Link>
        </template>
        <generic-table :source="users">
            <template #thead>
                <tr>
                    <th style="width: 46px">#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                </tr>
            </template>
            <tr v-for="user in users.data" :key="user.id">
                <td>{{ user.id }}</td>
                <td>
                    <Link :href="`/users/${user.id}`">
                        <span v-if="user.id == currentUser.id" class="badge badge-warning">Você</span>
                        <small
                            v-if="user.role.is_admin"
                            class="badge badge-pill badge-success"
                        >super user</small>
                        {{ user.name }}
                    </Link>
                </td>
                <td>{{ user.email }}</td>
            </tr>
        </generic-table>
    </auth-layout>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";
    import AuthLayout from "@/Layouts/Auth";
    import GenericTable from "@/CommonParts/GenericTable";

    export default {
        name: "IndexUsers",
        components: {
            Link,
            AuthLayout,
            GenericTable
        },
        props: {
            users: Object
        }
    };
</script>
