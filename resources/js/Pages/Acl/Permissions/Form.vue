<template>
    <generic-form :action="action" :method="method" :caption="caption" :form="form">
        <div class="form-row">
            <div class="form-group col">
                <label for="name">Nome</label>
                <div class="input-group">
                    <input
                        type="text"
                        v-model="form.name"
                        id="name"
                        class="form-control"
                        minlength="3"
                        maxlength="191"
                    />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" v-model="form.enabled" id="enabled" class="custom-control-input" />
                                <label for="enabled" class="custom-control-label">Ativo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <small v-if="form.errors.name" class="text-danger">{{ form.errors.name }}</small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="description">Descrição</label>
                <textarea
                    v-model="form.description"
                    id="description"
                    rows="3"
                    class="form-control"
                    maxlength="255"
                ></textarea>
            </div>
        </div>
    </generic-form>
</template>

<script>
    import GenericForm from "@/CommonParts/GenericForm";

    export default {
        name: "PermissionForm",
        components: {
            GenericForm
        },
        props: {
            action: String,
            method: String,
            caption: String,
            permission: Object
        },
        data() {
            return {
                form: this.$inertia.form(this.permission)
            };
        }
    };
</script>

<style>
</style>
