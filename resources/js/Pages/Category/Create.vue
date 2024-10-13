<script setup>
import { ref } from "vue";
import Header from "@/Layouts/Header.vue";
import { Link, useForm } from "@inertiajs/vue3";
import { routeList } from "@/routes.js";
import FileUpload from "@/Components/FileUpload.vue";

const toast = ref(null);

const form = useForm({
    name: "",
    image: "",
    description: "",
});
//main route of category
const route = routeList.category;
const submit = () => {
    if (form.name == "") {
        toast.value.add({
            severity: "error",
            summary: "Name Required",
            detail: "Please fill Name!",
            life: 3000, // Duration in milliseconds
        });
    }
    if (form.description == "") {
        toast.value.add({
            severity: "error",
            summary: "Description Required",
            detail: "Please fill Description!",
            life: 3000, // Duration in milliseconds
        });
    }
    if (form.name != "" && form.description != "") {
        form.post(route);
    }
};
</script>

<style lang="scss" scoped></style>

<template>
    <Header />
    <Toast ref="toast" />

    <br /><br />
    <br /><br />

    <form @submit.prevent="submit" enctype="multipart/form-data">
        <div class="border-red-400">
            <div class="flex justify-center mb-5">
                <div>
                    <FloatLabel variant="on">
                        <InputText id="name" v-model="form.name" />
                        <label for="name">Name</label>
                    </FloatLabel>
                </div>
            </div>
            <div class="flex justify-center mb-5">
                <FileUpload />
            </div>
            <div class="flex justify-center mb-8">
                <div>
                    <FloatLabel variant="on">
                        <InputText
                            id="description"
                            v-model="form.description"
                        />
                        <label for="description">Description</label>
                    </FloatLabel>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <Button class="me-3" severity="secondary">
                <Link :href="route">Cancel</Link>
            </Button>
            <br />
            <Button type="submit" severity="contrast">Submit</Button>
        </div>
    </form>
</template>
