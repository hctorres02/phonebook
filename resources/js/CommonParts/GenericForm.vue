<template>
    <form @submit.prevent="form.submit(method, action)">
        <slot />
        <div class="d-flex justify-content-end pt-3">
            <button class="btn btn-primary" :disabled="form.processing">
                <i class="bi bi-save"></i>
                {{ caption }}
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "GenericForm",
        props: {
            method: String,
            action: String,
            caption: String,
            form: Object
        }
    };
</script>
