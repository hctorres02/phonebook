<template>
    <form @submit.prevent="handleSubmit">
        <h4 class="border-bottom mb-4 pb-2">
            <slot />
        </h4>
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
        <div class="form-row">
            <div class="form-group col">
                <button class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        props: {
            errors: Object,
            user: {
                type: Object,
                default() {
                    return {
                        id: null,
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
        },
        methods: {
            handleSubmit() {
                const action = "/users";
                const id = this.user.id;

                if (id) {
                    return this.form.put(`${action}/${id}`);
                }

                return this.form.post(action);
            }
        }
    };
</script>>
