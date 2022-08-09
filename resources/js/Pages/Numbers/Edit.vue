<template>
    <auth-layout title="Editar número" :back-to="`/numbers/${number.id}`">
        <template #buttons>
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
        <number-form
            :action="`/numbers/${number.id}`"
            method="put"
            caption="Salvar alterações"
            :customers="customers"
            :defaultCustomer="defaultCustomer"
            :statuses="statuses"
            :defaultStatus="defaultStatus"
            :number="number"
        />
    </auth-layout>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";
    import AuthLayout from "@/Layouts/Auth";
    import NumberForm from "@/Pages/Numbers/Form";

    export default {
        name: "EditNumber",
        props: {
            customers: Object,
            defaultCustomer: Number | String,
            statuses: Object,
            defaultStatus: Number | String,
            number: Object
        },
        components: {
            Link,
            AuthLayout,
            NumberForm
        }
    };
</script>
