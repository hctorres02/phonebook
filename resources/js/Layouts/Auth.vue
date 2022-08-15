<template>
    <div>
        <nav class="navbar navbar-dark bg-dark sticky-top shadow-sm mb-4">
            <div class="container">
                <Link href="/home" class="navbar-brand">Customer Service</Link>
                <div class="navbar-nav">
                    <li class="nav-item">
                        <Link href="/logout" class="nav-link">Desconectar</Link>
                    </li>
                </div>
            </div>
        </nav>
        <main class="container">
            <div class="row">
                <aside class="col-3">
                    <ul class="list-group list-group-flush">
                        <li v-if="can('acl_permissions_view')" class="list-group-item bg-transparent">
                            <Link href="/permissions">Permissões</Link>
                        </li>
                        <li v-if="can('acl_roles_view')" class="list-group-item bg-transparent">
                            <Link href="/roles">Perfis</Link>
                        </li>
                        <li class="list-group-item bg-transparent">
                            <Link v-if="can('users_view')" href="/users">Usuários</Link>
                            <Link v-else :href="`/users/${currentUser.id}`">Meu usuário</Link>
                        </li>
                    </ul>
                    <ul class="list-group list-group-flush mt-4">
                        <li v-if="can('customers_view')" class="list-group-item bg-transparent">
                            <Link href="/customers">Clientes</Link>
                        </li>
                        <li class="list-group-item bg-transparent">
                            <Link href="/numbers">Catálogo telefônico</Link>
                        </li>
                    </ul>
                </aside>
                <main class="col-9">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4 v-if="title" class="mb-0 pb-0 pt-2 font-weight-bold">{{ title }}</h4>
                                <div>
                                    <slot name="buttons" />
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <slot />
                        </div>
                    </div>
                </main>
            </div>
        </main>
    </div>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";

    export default {
        name: "AuthLayout",
        props: {
            title: String,
            backTo: String
        },
        components: {
            Link
        }
    };
</script>
