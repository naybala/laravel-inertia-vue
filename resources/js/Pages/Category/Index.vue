<script setup>
import Header from "@/Layouts/Header.vue";
import { Link } from "@inertiajs/vue3";
import { routeList, commonLastRoute } from "@/routes.js";

const headers = ["name", "description", "image"];
const route = routeList.category;
const createRoute = commonLastRoute.create;
defineProps({
    categories: {
        type: Array,
        default: () => [],
    },
});
</script>
<template>
    <Header />
    <div>
        <Button severity="info">
            <Link :href="route + createRoute">Create new Category</Link>
        </Button>
        <br />

        <br />

        <table>
            <thead>
                <tr>
                    <th v-for="header in headers" :key="header">
                        {{ header }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="category in categories" :key="category.id">
                    <td>{{ category.name }}</td>
                    <td>{{ category.description }}</td>
                    <td>
                        <Image
                            :src="category.image"
                            alt="Image"
                            width="25"
                            preview
                        />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
