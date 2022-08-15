<template>
    <auth-layout title="Clientes">
        <template #buttons>
            <Link v-if="can('customers_create')" href="/customers/create" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i>
                Cadastrar cliente
            </Link>
        </template>
        <generic-table :source="customers">
            <template #thead>
                <tr>
                    <th style="width: 46px">#</th>
                    <th colspan="2">Nome</th>
                </tr>
            </template>
            <tr v-for="customer in customers.data" :key="customer.id">
                <td>{{ customer.id }}</td>
                <td>
                    <Link :href="`/customers/${customer.id}`">{{ customer.name }}</Link>
                </td>
                <td class="text-right">
                    <Link :href="`/numbers/create?customer_id=${customer.id}`">Cadastrar número</Link>
                </td>
            </tr>
        </generic-table>
    </auth-layout>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";
    import AuthLayout from "@/Layouts/Auth";
    import GenericTable from "@/CommonParts/GenericTable";

    export default {
        name: "IndexCustomers",
        components: {
            Link,
            AuthLayout,
            GenericTable
        },
        props: {
            customers: Object
        }
    };
</script>
