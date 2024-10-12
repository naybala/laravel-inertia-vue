<template>
    <Header />
    <div>
        <Button severity="info">
            <Link href="/posts/create">Create new Post</Link>
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
                <tr v-for="post in posts" :key="post.id">
                    <td>{{ post.title }}</td>
                    <td>{{ post.body }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import Header from "@/Layouts/Header.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    posts: {
        type: Array,
        default: () => [],
    },
});

const headers = ["posts", "body"];
</script>
