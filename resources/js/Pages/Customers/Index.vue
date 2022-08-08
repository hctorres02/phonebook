<template>
    <auth-layout>
        <h4 class="border-bottom mb-4 pb-2">Clientes</h4>
        <p>
            <Link href="/customers/create">Cadastrar cliente</Link>
        </p>
        <div v-if="customers.data" class="table-responsive">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th style="width: 46px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="customer in customers.data" :key="customer.id">
                        <td>{{ customer.id }}</td>
                        <td>
                            <Link :href="`/customers/${customer.id}`">{{ customer.name }}</Link>
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
