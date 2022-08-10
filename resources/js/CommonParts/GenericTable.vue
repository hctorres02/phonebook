<template>
    <div v-if="source.length || source.data.length" class="table-responsive">
        <table class="table table-borderless table-hover">
            <thead>
                <slot name="thead" />
            </thead>
            <tbody>
                <slot />
            </tbody>
        </table>
        <ul
            v-if="source.links && source.links.length > 3"
            class="pagination justify-content-end mt-4"
        >
            <li
                v-for="link in source.links"
                :key="link.label"
                :class="{active: link.active, disabled: !link.url}"
                class="page-item"
            >
                <Link :href="link.url" class="page-link" v-html="link.label" />
            </li>
        </ul>
    </div>
    <div v-else class="text-center">Não há dados</div>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";

    export default {
        name: "GenericTable",
        props: {
            source: Array | Object
        },
        components: {
            Link
        }
    };
</script>
