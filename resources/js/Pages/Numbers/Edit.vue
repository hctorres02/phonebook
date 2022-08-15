<template>
    <auth-layout title="Editar número" :back-to="`/numbers/${number.id}`">
        <template #buttons>
            <LinkDestroy
                v-if="can('numbers_destroy')"
                :href="`/numbers/${number.id}`"
                label="Excluír número"
            />
        </template>
        <number-form
            :action="`/numbers/${number.id}`"
            method="put"
            caption="Salvar alterações"
            :customers="customers"
            :statuses="statuses"
            :preferences="preferences"
            :defaultCustomer="defaultCustomer"
            :defaultStatus="defaultStatus"
            :number="number"
        />
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";
    import NumberForm from "@/Pages/Numbers/Form";
    import LinkDestroy from "@/CommonParts/LinkDestroy";

    export default {
        name: "EditNumber",
        props: {
            customers: Object,
            defaultCustomer: Number | String,
            statuses: Object,
            preferences: Object,
            defaultStatus: Number | String,
            number: Object
        },
        components: {
            AuthLayout,
            NumberForm,
            LinkDestroy
        }
    };
</script>
