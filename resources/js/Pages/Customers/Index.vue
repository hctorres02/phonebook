<template>
    <auth-layout title="Clientes">
        <template #buttons>
            <Link href="/customers/create" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i>
                Cadastrar cliente
            </Link>
        </template>
        <div v-if="customers.data" class="table-responsive">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th style="width: 46px">#</th>
                        <th colspan="2">Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="customer in customers.data" :key="customer.id">
                        <td>{{ customer.id }}</td>
                        <td>
                            <Link :href="`/customers/${customer.id}`">{{ customer.name }}</Link>
                        </td>
                        <td class="text-right">
                            <Link :href="`/numbers/create?customer_id=${customer.id}`">Cadastrar número</Link>
                        </td>
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
        name: "IndexCustomers",
        components: {
            Link,
            AuthLayout
        },
        props: {
            customers: Object
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
