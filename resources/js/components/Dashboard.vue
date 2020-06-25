<template>
    <div>
        <div class="flex flex-wrap w-full items-stetch">
            <div class="p-2 w-1/3 lg:w-1/4">
                <div class="flex flex-col w-full py-4 bg-white rounded-lg shadow-lg">
                    <div class="px-3 py-4 flex flex-col items-center lg:flex-row lg:items-end">
                        <img class="rounded-full w-1/2 lg:w-1/4 lg:mr-4" src="/images/avatar.jpg" alt="avatar">
                        <div class="flex flex-col">
                            <div class="text-gray-500">Dashboard</div>
                            <div class="text-gray-700 text-lg font-semibold">{{ currentName }}</div>
                        </div>
                    </div>
                    <div 
                        v-for="(page, index) in pages" 
                        :key="index"
                        @click="changeTab(index)" 
                        class="py-2 my-1 pl-4 text-lg text-gray-700 hover:text-gray-200 hover:bg-gray-700 cursor-pointer"
                        :class="[(index === selected) ? 'active-tab' : '']">
                        <i :class="page.icon" class="mr-3"></i> {{ page.name }}
                    </div>
                </div>
            </div>
            <div class="p-2 w-2/3 lg:w-3/4">
                <div class="flex flex-col text-gray-700 w-full py-4 bg-white rounded-lg shadow-lg">
                    <div class="text-xl font-semibold ml-4 mb-4">
                        {{ pages[selected].name }}
                    </div>
                    <div class="pl-6 pr-2">
                        <div v-bind:class="[(selected == 0) ? 'block' : 'hidden']">
                            <div class="flex flex-col my-4">
                                <label class="text-sm font-semibold mb-1" for="name">Name</label>
                                <input type="text" name="name" :placeholder="currentName" v-model="user.name" class="border rounded border-gray-200 p-1 focus:border-blue-200 w-64" >
                            </div>
                            <div class="flex flex-col my-4">
                                <label class="text-sm font-semibold mb-1" for="email">Email</label>
                                <input type="email" name="email" :placeholder="currentEmail" v-model="user.email" class="border rounded border-gray-200 p-1 focus:border-blue-200 w-64" >
                            </div>
                            <div class="my-4">
                                <button @click="submitUserInfo()" class="px-2 py-1 bg-blue-600 text-white rounded focus:border-blue-200">Save Changes</button>
                            </div>
                        </div>
                        <div v-bind:class="[(selected == 1) ? 'block' : 'hidden']">
                            <div class="my-4">
                                <input type="file" @change="setFile" >
                            </div>
                            <div class="my-4">
                                <button @click="changeAvatar()" class="px-2 py-1 bg-blue-600 text-white rounded focus:border-blue-200">Change Avatar</button>
                            </div>
                        </div>
                        <div v-bind:class="[(selected == 2) ? 'block' : 'hidden']">
                            <div class="flex flex-col my-4">
                                <label class="text-sm font-semibold mb-1" for="password">Old Password</label>
                                <input type="password" name="password" v-model="password.old" class="border rounded border-gray-200 p-1 focus:border-blue-200 w-64" >
                            </div>
                            <div class="flex flex-col my-4">
                                <label class="text-sm font-semibold mb-1" for="newPassword">New Password</label>
                                <input type="password" name="newPassword" v-model="password.new" class="border rounded border-gray-200 p-1 focus:border-blue-200 w-64" >
                            </div>
                            <div class="flex flex-col my-4">
                                <label class="text-sm font-semibold mb-1" for="confirmPassword">Confirm Password</label>
                                <input type="password" name="confirmPassword" v-model="password.confirm" class="border rounded border-gray-200 p-1 focus:border-blue-200 w-64" >
                            </div>
                            <div class="my-4">
                                <button @click="changePassword()" class="px-2 py-1 bg-blue-600 text-white rounded focus:border-blue-200">Change Password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col m-3 fixed bottom-0 right-0 w-full lg:w-64">
                <span
                    v-for="(alert, index) in alerts" 
                    :key="index" 
                    v-on:click="alerts.splice(index,1)" >

                    <AlertBox 
                    v-bind:success="alert.success"
                    :message="alert.message" />
                </span>
                <!-- <AlertBox message="Hello" success />
                <AlertBox message="Hello" v-bind:success="false" /> -->
            </div>
        </div>
    </div>
</template>

<script>
import AlertBox from './AlertBox.vue';

export default {
    components: {
        AlertBox
    },
    props: {
        name: {
            type: String,
            required: true
        },
        email: {
            type: String,
            required: true
        },
        identity: {
            required: true
        },
        selectedTag: {
            type: Number,
            required: false,
            default: 0
        }
    },
    data () {
        return {
            currentName: this.name,
            currentEmail: this.email,
            selected: this.selectedTag,
            pages: [
                { name: "Personal Informations", icon: "fas fa-user"},
                { name: "Change Avatar", icon: "fas fa-camera"},
                { name: "Change Password", icon: "fas fa-lock"}
            ],
            user: {
                name: "",
                email: ""
            },
            avatar: null,
            password: {
                old: "",
                new: "",
                confirm: ""
            },
            alerts: []
        }
    },
    methods: {
        changeTab: function (index) {
            if (index === this.selected) return 

            this.selected = index
            this.resetData()
        },
        removeAlert : function (i) {
            console.log(i)
        },
        setFile: function (e) {
            let filereader = new FileReader()

            filereader.readAsDataURL(e.target.files[0])

            filereader.onload = (e) => {
                this.avatar = e.target.result
            }
        },
        resetData: function () {
            this.user = {
                name: "",
                email: ""
            }
            
            this.password = {
                old: "",
                new: "",
                confirm: ""
            }

            this.avatar = null
        },
        submitUserInfo: function() {
            if (this.user.name === "" && this.user.email === "") return 

            axios.put("/dashboard/userinfo/"+this.identity, this.user).then(response => {
                console.log(response.data.message)
                this.alerts.push({ 
                    success: response.data.success,
                    message: response.data.message 
                })

                if (response.data.success) {
                    if (this.user.name !== "")
                        this.currentName = this.user.name 
                    if (this.user.email !== "")
                        this.currentEmail = this.user.email
                    
                    this.resetData()
                }
            }).catch(error => {
                console.log(error)
            })
        },
        changeAvatar: function () {
            if(this.avatar === null) return

            let data = new FormData()

            axios.put("/dashboard/avatar/"+this.identity, {file: this.avatar}).then(response => {
                console.log(response.data.message)

                this.alerts.push({ 
                    success: response.data.success,
                    message: response.data.message 
                })

                if (response.data.success)
                    this.resetData()
            }).catch(error => {
                console.log(error)
            })
        },
        changePassword: function() {
            if (this.password.old === "" || this.password.new === "" || this.password.confirm === "") return

            axios.put("/dashboard/password/"+this.identity, this.password).then(response => {
                console.log(response.data.message)

                this.alerts.push({ 
                    success: response.data.success,
                    message: response.data.message 
                })

                if (response.data.success)
                    this.resetData()
            }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>

<style>
    .active-tab {
        background-color: #4a5568;
        color: #edf2f7;
    }

    .notification-nest {
        position: fixed;
        right: 15px;
        bottom: 15px;
        display: flex;
        flex-direction: column-reverse;
    }

    .notification {
        min-height: 100px;
        min-width: 200px;
        color: #f8f8f8;
        padding: 1.25rem;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        padding: 10px;
        margin-bottom: 15px;
    }

    .notification-nest .success {
        background-color: #00c234;
    }

    .notification-nest .error {
        background-color: #de0d0d;
    }
</style>