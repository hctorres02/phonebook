<template>
    <auth-layout title="Cadastrar número" back-to="/numbers">
        <number-form
            action="/numbers"
            method="post"
            caption="Salvar"
            :customers="customers"
            :statuses="statuses"
            :preferences="preferences"
            :number="number"
        />
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";
    import NumberForm from "@/Pages/Numbers/Form";

    export default {
        props: {
            customers: Object,
            statuses: Object,
            preferences: Object,
            number: Object
        },
        components: {
            AuthLayout,
            NumberForm
        }
    };
</script>
