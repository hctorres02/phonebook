<template>
    <auth-layout :title="`${number.number}`">
        <template #buttons>
            <Link :href="`/numbers/${number.id}/edit`" class="btn btn-primary">
                <i class="bi bi-pencil"></i>
                Editar número
            </Link>
            <Link
                :href="`/numbers/${number.id}`"
                method="delete"
                as="button"
                class="btn btn-danger"
            >
                <i class="bi bi-trash"></i>
                Excluír número
            </Link>
        </template>
        <div class="form-row">
            <div class="col-md-3 col font-weight-bold">Cliente</div>
            <div class="col">
                <Link :href="`/customers/${number.customer_id}`">{{ number.customer.name }}</Link>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 col font-weight-bold">Status</div>
            <div class="col">{{ number.statusLabel }}</div>
        </div>
    </auth-layout>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";
    import AuthLayout from "@/Layouts/Auth";

    export default {
        components: {
            Link,
            AuthLayout
        },
        props: {
            number: Object
        }
    };
</script>

<style>
</style>
