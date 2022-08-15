<template>
    <auth-layout title="Editar cliente" :back-to="`/customers/${customer.id}`">
        <template #buttons>
            <LinkDestroy
                v-if="can('customers_destroy')"
                :href="`/customers/${customer.id}`"
                label="Excluír cliente"
            />
        </template>
        <customer-form
            method="put"
            :action="`/customers/${customer.id}`"
            caption="Salvar alterações"
            :statuses="statuses"
            :customer="customer"
        />
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";
    import CustomerForm from "@/Pages/Customers/Form";
    import LinkDestroy from "@/CommonParts/LinkDestroy";

    export default {
        name: "EditCustomer",
        components: {
            AuthLayout,
            CustomerForm,
            LinkDestroy
        },
        props: {
            statuses: Object,
            customer: Object
        }
    };
</script>
