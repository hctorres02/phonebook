<template>
    <auth-layout>
        <customer-form
            method="post"
            action="/customers"
            title="Cadastrar cliente"
            caption="Salvar"
            :statuses="statuses"
            :default-status="defaultStatus"
        />
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";
    import CustomerForm from "@/Pages/Customers/Form";

    export default {
        name: "CreateCustomer",
        components: {
            AuthLayout,
            CustomerForm
        },
        props: {
            statuses: Object,
            defaultStatus: Number
        }
    };
</script>
