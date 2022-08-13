<template>
    <generic-form :action="action" :method="method" :caption="caption" :form="form">
        <div class="form-row">
            <div class="form-group col">
                <label for="name">Nome</label>
                <input v-model="form.name" type="text" id="name" class="form-control" />
                <small v-if="form.errors.name" class="text-danger">{{ form.errors.name }}</small>
            </div>
            <div class="form-group col-md-4 col">
                <label for="role_id">Perfil</label>
                <select v-model="form.role_id" id="role_id" class="form-control">
                    <option v-for="(name, id) of roles" :key="id" :value="id">{{ name }}</option>
                </select>
                <small v-if="form.errors.role_id" class="text-danger">{{ form.errors.role_id }}</small>
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
            user: Object,
            roles: Object
        },
        data() {
            return {
                form: this.$inertia.form(this.user)
            };
        }
    };
</script>
