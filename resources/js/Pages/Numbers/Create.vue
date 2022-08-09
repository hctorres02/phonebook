<template>
    <auth-layout title="Cadastrar número" back-to="/numbers">
        <number-form
            action="/numbers"
            method="post"
            caption="Salvar"
            :customers="customers"
            :defaultCustomer="defaultCustomer"
            :statuses="statuses"
            :defaultStatus="defaultStatus"
        />
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";
    import NumberForm from "@/Pages/Numbers/Form";

    export default {
        props: {
            customers: Object,
            defaultCustomer: Number | String,
            statuses: Object,
            defaultStatus: Number | String
        },
        components: {
            AuthLayout,
            NumberForm
        }
    };
</script>
