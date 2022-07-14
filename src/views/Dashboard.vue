<template>
    <div class="about">
        <h1>{{ login.message }}</h1>
    </div>
</template>
<script>
import useLogin from '../composables/login'
export default {
    setup() {
        const { login } = useLogin()
        return {
            login
        }
    }
}
</script>
<style>
@media (min-width: 1024px) {
    .about {
        min-height: 100vh;
        display: flex;
        align-items: center;
    }
}
</style>