import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'
const login = ref([])
export default function useLogin() {
const router = useRouter()
    const postLogin = async(form)=>{
        let response = await axios.post('http://127.0.0.1:9501/user/login',form)
        if (response.data.status) {
            login.value = response.data
            router.push({ name: 'dashboard' })
        } else {
            alert("wrong password")
        }
	
    }
    return {
        login,
        postLogin
    }
}
