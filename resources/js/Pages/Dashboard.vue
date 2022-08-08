<template>
    <auth-layout>
        <h4 class="border-bottom mb-4 pb-2">Dashboard</h4>
        <div class="row row-cols-3">
            <div v-for="(element, key) in indicadores" :key="key" class="col">
                <div class="card">
                    <div class="card-header">{{ element.name }}</div>
                    <div class="card-body">
                        <h2>{{ element.amount }}</h2>
                    </div>
                </div>
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
