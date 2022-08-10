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
        <div class="form-row">
            <div class="form-group col">
                <label>Preferences</label>
                <ul class="list-group">
                    <li
                        v-for="(preference, name) in preferences"
                        :key="name"
                        class="list-group-item"
                    >
                        <div class="custom-control custom-checkbox">
                            <input
                                v-model="form.preferences"
                                type="checkbox"
                                :id="name"
                                :value="name"
                                class="custom-control-input"
                            />
                            <label :for="name" class="custom-control-label">
                                {{ preference.label }}
                                <span
                                    class="d-block text-muted"
                                >{{ preference.description }}</span>
                            </label>
                        </div>
                    </li>
                </ul>
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
            number: Object,
            customers: Object,
            statuses: Object,
            preferences: Object
        },
        data() {
            return {
                form: this.$inertia.form(this.number)
            };
        }
    };
</script>
