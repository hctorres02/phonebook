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
    </auth-layout>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";
    import AuthLayout from "@/Layouts/Auth";
    import LinkDestroy from '@/CommonParts/LinkDestroy.vue';

    export default {
        name: "ShowCustomer",
        components: {
            Link,
            LinkDestroy,
            AuthLayout
        },
        props: {
            customer: Object
        }
    };
</script>
