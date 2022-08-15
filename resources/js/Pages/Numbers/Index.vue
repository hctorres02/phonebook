<template>
    <auth-layout title="Catálogo telefônico">
        <template #buttons>
            <Link v-if="can('numbers_create')" href="/numbers/create" class="btn btn-primary">
                <i class="bi bi-journal-plus"></i>
                Cadastrar número
            </Link>
        </template>
        <generic-table :source="numbers">
            <template #thead>
                <tr>
                    <th style="width: 46px">#</th>
                    <th>Número</th>
                    <th>Cliente</th>
                </tr>
            </template>
            <tr v-for="number in numbers.data" :key="number.id">
                <td>{{ number.id }}</td>
                <td>
                    <Link :href="`/numbers/${number.id}`">{{ number.number }}</Link>
                </td>
                <td>
                    <Link :href="`/customers/${number.customer.id}`">{{ number.customer.name }}</Link>
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
        name: "IndexNumbers",
        components: {
            Link,
            AuthLayout,
            GenericTable
        },
        props: {
            numbers: Object
        }
    };
</script>

<style>
</style>
