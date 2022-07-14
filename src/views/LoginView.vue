<template>
    <div class="about">
        <h1>Login</h1>
        <hr/>
        <form @submit.prevent="checkLogin">
            <input type="text" v-model="form.name" /><br/>
            <input type="text" v-model="form.pass" />
            <button>Submit</button>
        </form>
    </div>
</template>
<script>
import useLogin from '../composables/login'
import { reactive } from 'vue'
export default {
    setup() {
        const form = reactive({
            'name': '',
            'pass': ''
        })
        const { login, postLogin } = useLogin()

        const checkLogin = async () => {
            await postLogin({ ...form })
        }
        return {
            form,
            checkLogin
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
