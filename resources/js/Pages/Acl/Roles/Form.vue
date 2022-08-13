<template>
    <generic-form :action="action" :method="method" :caption="caption" :form="form">
        <div class="form-row">
            <div class="form-group col">
                <label for="name">Nome</label>
                <input
                    type="text"
                    v-model="form.name"
                    id="name"
                    class="form-control"
                    minlength="3"
                    maxlength="191"
                />
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
                <small
                    v-if="form.errors.description"
                    class="text-danger"
                >{{ form.errors.description }}</small>
            </div>
        </div>
    </generic-form>
</template>

<script>
    import GenericForm from "@/CommonParts/GenericForm";

    export default {
        name: "RoleForm",
        components: {
            GenericForm
        },
        props: {
            action: String,
            method: String,
            caption: String,
            role: Object,
        },
        data() {
            return {
                form: this.$inertia.form(this.role)
            };
        }
    };
</script>
