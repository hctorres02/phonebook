<template>
    <Link :href="href" as="button" method="delete" class="btn btn-danger">
        <i class="bi bi-trash"></i>
        {{ label }}
    </Link>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";

    export default {
        name: "LinkDestroy",
        props: {
            href: String,
            label: String
        },
        components: {
            Link
        }
    };
</script>
