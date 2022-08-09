<template>
    <generic-form :action="action" :method="method" :caption="caption" :form="form">
        <div class="form-row">
            <div class="form-group col">
                <label for="name">Nome</label>
                <input v-model="form.name" type="text" id="name" class="form-control" />
                <small v-if="form.errors.name" class="text-danger">{{ form.errors.name }}</small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="email">E-mail</label>
                <input v-model="form.email" type="email" id="email" class="form-control" />
                <small v-if="form.errors.email" class="text-danger">{{ form.errors.email }}</small>
            </div>
        </div>
    </generic-form>
</template>

<script>
    import GenericForm from "@/CommonParts/GenericForm";

    export default {
        name: "UserForm",
        components: {
            GenericForm
        },
        props: {
            action: String,
            method: String,
            caption: String,
            user: {
                type: Object,
                default() {
                    return {
                        name: null,
                        email: null
                    };
                }
            }
        },
        data() {
            return {
                form: this.$inertia.form(this.user)
            };
        }
    };
</script>
