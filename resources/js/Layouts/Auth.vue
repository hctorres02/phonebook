<template>
    <div>
        <nav class="navbar navbar-dark bg-primary shadow-sm mb-4">
            <div class="container">
                <Link href="/" class="navbar-brand">Customer Service</Link>
            </div>
        </nav>
        <main class="container">
            <div class="row">
                <aside class="col-3">
                    <ul class="list-group">
                        <p>
                            <Link href="/users">Usuários</Link>
                        </li>
                        <p>
                            <Link href="/customers">Clientes</Link>
                        </p>
                    </ul>
                </aside>
                <main class="col-9">
                    <div class="border rounded bg-white p-4 shadow-sm">
                        <slot />
                    </div>
                </main>
            </div>
        </main>
    </div>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue";

    export default {
        name: 'AuthLayout',
        components: {
            Link,
        }
    };
</script>
