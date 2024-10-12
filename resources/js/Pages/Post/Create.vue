<template>
    <Header />
    <Toast ref="toast" />

    <br /><br />
    <br /><br />

    <form @submit.prevent="submit">
        <div class="border-red-400">
            <div class="flex justify-center mb-5">
                <div>
                    <FloatLabel variant="on">
                        <InputText id="title" v-model="form.title" />
                        <label for="title">Title</label>
                    </FloatLabel>
                </div>
            </div>
            <div class="flex justify-center mb-8">
                <div>
                    <FloatLabel variant="on">
                        <InputText id="body" v-model="form.body" />
                        <label for="body">Body</label>
                    </FloatLabel>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <Button class="me-3" severity="secondary">
                <Link href="/posts">Cancel</Link>
            </Button>
            <br />
            <Button type="submit" severity="contrast">Submit</Button>
        </div>
    </form>
</template>

<script setup>
import { ref } from "vue";
import Header from "@/Layouts/Header.vue";
import { Link } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";
const toast = ref(null);

const form = useForm({
    title: "",
    body: "",
});

const submit = () => {
    if (form.title == "") {
        toast.value.add({
            severity: "error",
            summary: "Title Required",
            detail: "Please fill title!",
            life: 3000, // Duration in milliseconds
        });
    }
    if (form.body == "") {
        toast.value.add({
            severity: "error",
            summary: "Body Required",
            detail: "Please fill body!",
            life: 3000, // Duration in milliseconds
        });
    }
    if (form.title != "" && form.body != "") {
        form.post("/posts");
    }
};
</script>
<style lang="scss" scoped></style>
