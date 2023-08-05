<template>
    <div>
        <form @submit.prevent="updateAvatar">
            <input type="file" ref="avatarInput" @change="onAvatarChange" accept="image/*">
            <button type="submit">Update Avatar</button>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';
// import { Inertia } from from '@inertiajs/vue3'

const avatarInput = ref(null);

const onAvatarChange = () => {
    if (avatarInput.value.files.length > 0) {
        // Handle preview or any other logic here
    }
};

const updateAvatar = () => {
    const formData = new FormData();
    formData.append('avatar', avatarInput.value.files[0]);

    Inertia.post(route('user.avatar.update'), formData);
};
</script>