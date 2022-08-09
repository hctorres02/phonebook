<template>
    <auth-layout title="Dashboard">
        <div class="row row-cols-3">
            <div v-for="(element, key) in indicadores" :key="key" class="col text-center">
                <h1>{{ element.amount }}</h1>
                <h5>{{ element.name }}</h5>
            </div>
        </div>
    </auth-layout>
</template>

<script>
    import AuthLayout from "@/Layouts/Auth";

    export default {
        name: "Dashboard",
        components: {
            AuthLayout
        },
        props: {
            indicadores: Array
        }
    };
</script>

<style>
</style>
