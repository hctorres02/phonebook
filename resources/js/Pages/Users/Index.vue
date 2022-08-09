<template>
    <auth-layout title="Usuários">
        <template #buttons>
            <Link href="/users/create" class="btn btn-primary">
                <i class="bi bi-person-plus"></i>
                Cadastrar usuário
            </Link>
        </template>
        <div v-if="users.data" class="table-responsive">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th style="width: 46px">#</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users.data" :key="user.id">
                        <td>{{ user.id }}</td>
                        <td>
                            <Link :href="`/users/${user.id}`">
                                <span v-if="user.id == currentUser.id" class="badge badge-warning">Você</span>
                                {{ user.name }}
                            </Link>
                        </td>
                        <td>{{ user.email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div v-else class="text-center">Não há dados.</div>
    </auth-layout>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";
    import AuthLayout from "@/Layouts/Auth";

    export default {
        name: "IndexUsers",
        components: {
            Link,
            AuthLayout
        },
        props: {
            users: Array
        },
        computed: {
            currentUser() {
                return this.$page.props.auth.user;
            }
        }
    };
</script>

<style>
</style>
