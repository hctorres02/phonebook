<template>
    <auth-layout>
        <customer-form
            method="put"
            :action="`/customers/${customer.id}`"
            title="Editar cliente"
            caption="Salvar alterações"
            :statuses="statuses"
            :customer="customer"
        />
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";
    import CustomerForm from "@/Pages/Customers/Form";

    export default {
        name: "EditCustomer",
        components: {
            AuthLayout,
            CustomerForm
        },
        props: {
            statuses: Object,
            customer: Object,
        }
    };
</script>
