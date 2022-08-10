<template>
    <auth-layout :title="customer.name" back-to="/customers">
        <template #buttons>
            <Link :href="`/customers/${customer.id}/edit`" class="btn btn-primary">
                <i class="bi bi-pencil"></i>
                Editar cliente
            </Link>
            <LinkDestroy :href="`/customers/${customer.id}`" label="Excluír cliente" />
        </template>
        <div class="form-row">
            <div class="col-md-3 font-weight-bold">Status</div>
            <div class="col">{{ customer.statusLabel }}</div>
        </div>
        <div class="form-row">
            <div class="form-group col-12">
                <generic-table :source="customer.numbers">
                    <template #thead>
                        <tr>
                            <th style="width: 46px">#</th>
                            <th>Número</th>
                        </tr>
                    </template>
                    <tr v-for="number in customer.numbers" :key="number.id">
                        <td>{{ number.id }}</td>
                        <td>
                            <Link :href="`/numbers/${number.id}`">{{ number.number }}</Link>
                        </td>
                    </tr>
                </generic-table>
            </div>
        </div>
    </auth-layout>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";
    import AuthLayout from "@/Layouts/Auth";
    import LinkDestroy from "@/CommonParts/LinkDestroy.vue";
    import GenericTable from "@/CommonParts/GenericTable";

    export default {
        name: "ShowCustomer",
        components: {
            Link,
            LinkDestroy,
            AuthLayout,
            GenericTable
        },
        props: {
            customer: Object
        }
    };
</script>
