<template>
    <generic-form :method="method" :action="action" :caption="caption" :form="form">
        <div class="form-row">
            <div class="form-group col">
                <label for="name">Nome</label>
                <input v-model="form.name" type="text" id="name" class="form-control" required />
                <small v-if="form.errors.name" class="text-danger">{{ form.errors.name }}</small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="document">Documento</label>
                <input
                    v-model="form.document"
                    type="text"
                    id="document"
                    class="form-control"
                    minlength="6"
                    maxlength="12"
                    required
                />
                <small v-if="form.errors.document" class="text-danger">{{ form.errors.document }}</small>
            </div>
            <div class="form-group col-md-4">
                <label for="status">Situação</label>
                <select v-model="form.status" class="form-control" required>
                    <option
                        v-for="(label, value) of statuses"
                        :key="value"
                        :value="value"
                    >{{ label }}</option>
                </select>
                <small v-if="form.errors.status" class="text-danger">{{ form.errors.status }}</small>
            </div>
        </div>
    </generic-form>
</template>

<script>
    import GenericForm from "@/CommonParts/GenericForm";

    export default {
        name: "CustomerForm",
        components: {
            GenericForm
        },
        props: {
            caption: String,
            action: String,
            method: String,
            statuses: Object,
            defaultStatus: Number | String,
            customer: {
                type: Object,
                default() {
                    return {
                        id: null,
                        name: null,
                        document: null,
                        status: null
                    };
                }
            }
        },
        data() {
            return {
                form: this.$inertia.form({
                    ...this.customer,
                    status: this.customer.status || this.defaultStatus
                })
            };
        }
    };
</script>
