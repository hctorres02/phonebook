<template>
    <generic-form :action="action" :method="method" :caption="caption" :form="form">
        <div class="form-row">
            <div class="form-group col">
                <label for="customer_id">Cliente</label>
                <select v-model="form.customer_id" id="customer_id" class="form-control">
                    <option v-for="(name, id) of customers" :key="id" :value="id">{{ name }}</option>
                </select>
                <small
                    v-if="form.errors.customer_id"
                    class="text-danger"
                >{{ form.errors.customer_id }}</small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="number">Número</label>
                <input
                    v-model="form.number"
                    type="text"
                    minlength="8"
                    maxlength="14"
                    class="form-control"
                />
                <small v-if="form.errors.number" class="text-danger">{{ form.errors.number }}</small>
            </div>
            <div class="form-group col-md-4 col">
                <label for="status">Status</label>
                <select v-model="form.status" id="customer_id" class="form-control">
                    <option v-for="(label, id) of statuses" :key="id" :value="id">{{ label }}</option>
                </select>
                <small v-if="form.errors.status" class="text-danger">{{ form.errors.status }}</small>
            </div>
        </div>
    </generic-form>
</template>

<script>
    import GenericForm from "@/CommonParts/GenericForm";

    export default {
        name: "NumberForm",
        components: {
            GenericForm
        },
        props: {
            action: String,
            method: String,
            caption: String,
            number: {
                type: Object,
                default() {
                    return {
                        customer_id: null,
                        number: null,
                        status: null
                    };
                }
            },
            customers: Object,
            defaultCustomer: Number | String,
            statuses: Object,
            defaultStatus: Number | String
        },
        data() {
            return {
                form: this.$inertia.form({
                    ...this.number,
                    customer_id: this.number.customer_id || this.defaultCustomer,
                    status: this.number.status || this.defaultStatus
                })
            };
        }
    };
</script>
