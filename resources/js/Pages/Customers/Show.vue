<template>
    <auth-layout>
        <h2>{{ customer.name }}</h2>
        <p class="text-muted">{{ customer.document }}</p>
        <p>
            <Link :href="`/customers/${customer.id}/edit`">Editar cliente</Link>
        </p>
        <Link
            :href="`/customers/${customer.id}`"
            class="btn btn-outline-danger"
            method="delete"
            as="button"
        >Excluír cliente</Link>
    </auth-layout>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";
    import AuthLayout from "@/Layouts/Auth";

    export default {
        name: "ShowCustomer",
        components: {
            Link,
            AuthLayout
        },
        props: {
            customer: Object
        }
    };
</script>
