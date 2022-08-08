<template>
    <auth-layout>
        <h4 class="border-bottom mb-4 pb-2">Usuários</h4>
        <p>
            <Link href="/users/create">Cadastrar usuário</Link>
        </p>
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
                            <Link :href="`/users/${user.id}/edit`">{{ user.name }}</Link>
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
        }
    };
</script>

<style>
</style>
